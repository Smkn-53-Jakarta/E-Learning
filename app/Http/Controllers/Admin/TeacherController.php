<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Models\Status;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index(): View
    {
        $teachersTrashed = Teacher::onlyTrashed()->count();
        $teachers = Teacher::with('user.status')->latest()->filter(request(['search']))->paginate(10);

        return view('admin.teachers.index', compact('teachersTrashed', 'teachers'));
    }

    public function create(): View
    {
        $statuses = Status::latest()->get();

        return view('admin.teachers.create', compact('statuses'));
    }

    public function store(StoreTeacherRequest $request): RedirectResponse
    {
        $data = Arr::except($request->validated(), ['image']);
        $data['password'] = bcrypt($data['name']);

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = FileHelper::optimizeAndUploadPicture($request->file('profile_picture'), 'users/images');
        }
        try {
            DB::beginTransaction();

            $user = User::create($data);

            Teacher::create([
                'user_id' => $user->id,
                'identification_number' => $data['identification_number']
            ]);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute())->with([
                'message' => 'Guru berhasil ditambahkan',
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

    public function edit(Teacher $teacher): View
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $teacher->update($data);

            DB::commit();
            return redirect(RoutingHelper::updateToIndexRoute())->with([
                'message' => 'Guru berhasil diubah',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function destroy(Teacher $teacher): RedirectResponse
    {
        $teacher->delete();

        return back()->with([
            'message' => 'Guru berhasil dihapus',
            'status' => 'success',
        ]);
    }

    public function trashed(): View
    {
        $teachers = Teacher::latest()->onlyTrashed()->filter(request(['search']))->paginate(10);

        return view('admin.teachers.trashed', compact('teachers'));
    }

    public function restore($id): RedirectResponse
    {
        Teacher::withTrashed()->findOrFail($id)->restore();

        return redirect(RoutingHelper::restoreToIndex())->with([
            'message' => 'Guru berhasil dipulihkan',
            'status' => 'success',
        ]);
    }

    public function forceDelete($id): RedirectResponse
    {
        Teacher::withTrashed()->findOrFail($id)->forceDelete();

        return redirect(RoutingHelper::forceDeleteToIndex())->with([
            'message' => 'Guru berhasil dihapus',
            'status' => 'success',
        ]);
    }
}
