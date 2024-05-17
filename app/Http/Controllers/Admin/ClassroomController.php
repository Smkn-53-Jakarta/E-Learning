<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Classroom\StoreClassroomRequest;
use App\Http\Requests\Classroom\UpdateClassroomRequest;
use App\Models\Classroom;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    public function index(): View
    {
        $classroomTrashed = Classroom::onlyTrashed()->count();
        $classrooms = Classroom::latest()->filter(request(['search']))->paginate(10);

        return view('admin.classroom.index', compact('classroomTrashed', 'classrooms'));
    }

    public function create(): View
    {
        return view('admin.classroom.create');
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
        return view('admin.classroom.edit', compact('classroom'));
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
        $classroom = Classroom::latest()->onlyTrashed()->filter(request(['search']))->paginate(10);

        return view('admin.classroom.trashed', compact('classroom'));
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
