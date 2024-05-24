<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\Classroom;
use App\Models\SchoolYear;
use App\Models\Status;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(): View
    {
        $studentsTrashed = Student::onlyTrashed()->count();
        $students = Student::with('user.status', 'classroom')->latest()->filter(request(['search']))->paginate(10);

        return view('admin.students.index', compact('studentsTrashed', 'students'));
    }

    public function create(): View
    {
        $statuses = Status::latest()->get();
        $classrooms = Classroom::latest()->get();
        $schoolYears = SchoolYear::latest()->get();

        return view('admin.students.create', compact('statuses', 'classrooms', 'schoolYears'));
    }

    public function store(StoreStudentRequest $request): RedirectResponse
    {
        $data = Arr::except($request->validated(), ['profile_picture']);
        $data['password'] = bcrypt($data['name']);

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = FileHelper::optimizeAndUploadPicture($request->file('profile_picture'), 'users/images');
        }

        try {
            DB::beginTransaction();

            $user = User::create($data);

            Student::create([
                'user_id' => $user->id,
                'classroom_id' => $data['classroom_id'],
                'school_year_id' => $data['school_year_id'],
                'identification_number' => $data['identification_number']
            ]);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute())->with([
                'message' => 'Murid berhasil ditambahkan',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            if (isset($data['profile_picture'])) {
                FileHelper::deleteImage('users/images', $data['profile_picture']);
            }

            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function edit(Student $student): View
    {
        $statuses = Status::latest()->get();
        $classrooms = Classroom::latest()->get();
        $schoolYears = SchoolYear::latest()->get();

        return view('admin.students.edit', compact('student', 'statuses', 'classrooms', 'schoolYears'));
    }

    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        $data = Arr::except($request->validated(), ['profile_picture']);

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = FileHelper::optimizeAndUploadPicture($request->file('profile_picture'), 'users/images');
            $oldImage = $student->user->profile_picture;
        }

        try {
            DB::beginTransaction();

            $student->update($data);
            $student->user->update($data);

            DB::commit();

            if (isset($oldImage)) {
                FileHelper::deleteImage('users/images', $oldImage);
            }

            return redirect(RoutingHelper::updateToIndexRoute())->with([
                'message' => 'Murid berhasil diubah',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            if (isset($data['profile_picture'])) {
                FileHelper::deleteImage('users/images', $data['profile_picture']);
            }

            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return back()->with([
            'message' => 'Murid berhasil dihapus',
            'status' => 'success',
        ]);
    }

    public function trashed(): View
    {
        $students = Student::latest()->onlyTrashed()->filter(request(['search']))->paginate(10);

        return view('admin.students.trashed', compact('students'));
    }

    public function restore($id): RedirectResponse
    {
        Student::withTrashed()->findOrFail($id)->restore();

        return redirect(RoutingHelper::restoreToIndex())->with([
            'message' => 'Siswa berhasil dipulihkan',
            'status' => 'success',
        ]);
    }

    public function forceDelete($id): RedirectResponse
    {
        Student::withTrashed()->findOrFail($id)->forceDelete();

        return redirect(RoutingHelper::forceDeleteToIndex())->with([
            'message' => 'Siswa berhasil dihapus',
            'status' => 'success',
        ]);
    }
}
