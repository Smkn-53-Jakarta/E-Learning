<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Material\StoreMaterialRequest;
use App\Http\Requests\Material\UpdateMaterialRequest;
use App\Models\Material;
use App\Models\ScheduleOfSubject;

class MaterialController extends Controller
{
    public function index(ScheduleOfSubject $scheduleOfSubject)
    {
        return view('teachers.materials.index', compact('scheduleOfSubject'));
    }

    public function create(ScheduleOfSubject $scheduleOfSubject)
    {
        return view('teachers.materials.create', compact('scheduleOfSubject'));
    }

    public function store(StoreMaterialRequest $request)
    {
        //
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
