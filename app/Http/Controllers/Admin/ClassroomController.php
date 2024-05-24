<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Classroom\StoreClassroomRequest;
use App\Http\Requests\Classroom\UpdateClassroomRequest;
use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    public function index(): View
    {
        $classroomsTrashed = Classroom::onlyTrashed()->count();
        $classrooms = Classroom::with('homeroomTeacher.user')->latest()->filter(request(['search']))->paginate(10);

        return view('admin.classrooms.index', compact('classroomsTrashed', 'classrooms'));
    }

    public function create(): View
    {
        $teachers = Teacher::with('user')->latest()->get();

        return view('admin.classrooms.create', compact('teachers'));
    }

    public function store(StoreClassroomRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            Classroom::create($data);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute())->with([
                'message' => 'Kelas berhasil ditambahkan',
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

    public function edit(Classroom $classroom): View
    {
        $teachers = Teacher::with('user')->latest()->get();

        return view('admin.classrooms.edit', compact('classroom', 'teachers'));
    }

    public function update(UpdateClassroomRequest $request, Classroom $classroom): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $classroom->update($data);

            DB::commit();
            return redirect(RoutingHelper::updateToIndexRoute())->with([
                'message' => 'Kelas berhasil diubah',
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

    public function destroy(Classroom $classroom): RedirectResponse
    {
        $classroom->delete();

        return back()->with([
            'message' => 'Kelas berhasil dihapus',
            'status' => 'success',
        ]);
    }

    public function trashed(): View
    {
        $classrooms = Classroom::with(['homeroomTeacher.user'])->latest()->onlyTrashed()->filter(request(['search']))->paginate(10);

        return view('admin.classrooms.trashed', compact('classrooms'));
    }

    public function restore($id): RedirectResponse
    {
        Classroom::withTrashed()->findOrFail($id)->restore();

        return redirect(RoutingHelper::restoreToIndex())->with([
            'message' => 'Kelas berhasil dipulihkan',
            'status' => 'success',
        ]);
    }

    public function forceDelete($id): RedirectResponse
    {
        Classroom::withTrashed()->findOrFail($id)->forceDelete();

        return redirect(RoutingHelper::forceDeleteToIndex())->with([
            'message' => 'Kelas berhasil dihapus',
            'status' => 'success',
        ]);
    }
}
