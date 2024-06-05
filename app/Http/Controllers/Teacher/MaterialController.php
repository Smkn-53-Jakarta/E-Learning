<?php

namespace App\Http\Controllers\Teacher;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Material\StoreMaterialRequest;
use App\Http\Requests\Material\UpdateMaterialRequest;
use App\Models\Material;
use App\Models\ScheduleOfSubject;
use Illuminate\Contracts\View\View;
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

    public function store(StoreMaterialRequest $request, ScheduleOfSubject $scheduleOfSubject)
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
            dd($th->getMessage());
            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function edit(Material $material)
    {
        return view('teachers.materials.edit');
    }

    public function update(UpdateMaterialRequest $request, Material $material)
    {
        //
    }

    public function destroy(Material $material)
    {
        //
    }

    public function trashed()
    {
        return view('teachers.materials.trashed');
    }
}
