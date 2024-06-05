<?php

namespace App\Http\Controllers\Teacher;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Material\StoreMaterialRequest;
use App\Http\Requests\Material\UpdateMaterialRequest;
use App\Models\Material;
use App\Models\ScheduleOfSubject;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index(ScheduleOfSubject $scheduleOfSubject): View
    {
        $materialsTrashed = Material::onlyTrashed()->count();
        $materials = Material::latest()->filter(request(['search']))->paginate(10);

        return view('teachers.materials.index', compact('scheduleOfSubject', 'materialsTrashed', 'materials'));
    }

    public function create(ScheduleOfSubject $scheduleOfSubject): View
    {
        return view('teachers.materials.create', compact('scheduleOfSubject'));
    }

    public function store(StoreMaterialRequest $request, ScheduleOfSubject $scheduleOfSubject): RedirectResponse
    {
        $data = $request->validated();
        $data['teacher_id'] = $scheduleOfSubject->teacher_id;
        $data['schedule_of_subject_id'] = $scheduleOfSubject->id;

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('materials', 'public');;
        }

        try {
            DB::beginTransaction();

            Material::create($data);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute($scheduleOfSubject->id))->with([
                'message' => 'Materi berhasil ditambahkan',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            if (isset($data['file'])) {
                Storage::disk('public')->delete($data['file']);
            }

            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function edit(ScheduleOfSubject $scheduleOfSubject, Material $material): View
    {
        return view('teachers.materials.edit', compact('scheduleOfSubject', 'material'));
    }

    public function update(UpdateMaterialRequest $request, ScheduleOfSubject $scheduleOfSubject, Material $material): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('materials', 'public');;
            $oldFile = $material->file;
        }

        try {
            DB::beginTransaction();

            $material->update($data);

            DB::commit();

            if (isset($oldFile)) {
                Storage::disk('public')->delete($oldFile);
            }

            return redirect(RoutingHelper::updateToIndexRoute($scheduleOfSubject->id))->with([
                'message' => 'Materi berhasil diubah',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            if (isset($data['file'])) {
                Storage::disk('public')->delete($data['file']);
            }

            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function destroy(ScheduleOfSubject $scheduleOfSubject, Material $material): RedirectResponse
    {
        $material->delete();

        return back()->with([
            'message' => 'Materi berhasil dihapus',
            'status' => 'success',
        ]);
    }

    public function trashed(ScheduleOfSubject $scheduleOfSubject): View
    {
        $materials = Material::latest()->onlyTrashed()->filter(request(['search']))->paginate(10);

        return view('teachers.materials.trashed', compact('materials', 'scheduleOfSubject'));
    }

    public function restore($scheduleOfSubjectId, $materialId): RedirectResponse
    {
        Material::withTrashed()->findOrFail($materialId)->restore();

        return redirect(RoutingHelper::restoreToIndex($scheduleOfSubjectId))->with([
            'message' => 'Materi berhasil dipulihkan',
            'status' => 'success',
        ]);
    }

    public function forceDelete($scheduleOfSubjectId, $materialId): RedirectResponse
    {
        $material = Material::withTrashed()->findOrFail($materialId);
        $material->forceDelete();

        Storage::disk('public')->delete($material->file);

        return redirect(RoutingHelper::forceDeleteToIndex($scheduleOfSubjectId))->with([
            'message' => 'Materi berhasil dihapus',
            'status' => 'success',
        ]);
    }
}
