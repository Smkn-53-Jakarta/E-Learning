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
        $data = Arr::except($request->validated(), ['profile_picture']);
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
        $statuses = Status::latest()->get();

        return view('admin.teachers.edit', compact('teacher', 'statuses'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher): RedirectResponse
    {
        $data = Arr::except($request->validated(), ['profile_picture']);

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = FileHelper::optimizeAndUploadPicture($request->file('profile_picture'), 'users/images');
            $oldImage = $teacher->user->profile_picture;
        }

        try {
            DB::beginTransaction();

            $teacher->update($data);
            $teacher->user()->update([
                'name' => $data['name'],
                'status_id' => $data['status_id'],
                'email' => $data['email'],
                'profile_picture' => $data['profile_picture'],
            ]);

            DB::commit();

            if (isset($oldImage)) {
                FileHelper::deleteImage('users/images', $oldImage);
            }

            return redirect(RoutingHelper::updateToIndexRoute())->with([
                'message' => 'Guru berhasil diubah',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            if (isset($data['profile_picture'])) {
                FileHelper::deleteImage('users/images', $data['profile_picture']);
            }
            dd($th->getMessage());
            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function destroy(Teacher $teacher): RedirectResponse
    {
        $teacher->user()->delete();
        $teacher->delete();

        return back()->with([
            'message' => 'Guru berhasil dihapus',
            'status' => 'success',
        ]);
    }

    public function trashed(): View
    {
        $teachers = Teacher::with(['user' => function ($query) {
            $query->withTrashed();
        }, 'user.status' => function ($query) {
            $query->withTrashed();
        }])->latest()->onlyTrashed()->filter(request(['search']))->paginate(10);

        return view('admin.teachers.trashed', compact('teachers'));
    }

    public function restore($id): RedirectResponse
    {
        $teacher = Teacher::withTrashed()->findOrFail($id);

        if ($teacher->user()->withTrashed()->exists()) {
            $teacher->user()->restore();
        }

        $teacher->restore();

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
