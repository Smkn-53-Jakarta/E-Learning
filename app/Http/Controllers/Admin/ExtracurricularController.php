<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Extracurricular\StoreExtracurricularRequest;
use App\Http\Requests\Extracurricular\UpdateExtracurricularRequest;
use App\Models\Extracurricular;
use Illuminate\Contracts\View\View;

class ExtracurricularController extends Controller
{
    public function index(): View
    {
        $extracurricularsTrashed = Extracurricular::onlyTrashed()->count();
        $extracurriculars = Extracurricular::latest()->filter(request(['search']))->paginate(10);

        return view('admin.extracurriculars.index', compact('extracurricularsTrashed', 'extracurriculars'));
    }

    public function create(): View
    {
        return view('admin.extracurriculars.create');
    }

    public function store(StoreExtracurricularRequest $request)
    {
        //
    }

    public function show(Extracurricular $extracurricular)
    {
        //
    }

    public function edit(Extracurricular $extracurricular): View
    {
        return view('admin.extracurriculars.edit', compact('extracurricular'));
    }

    public function update(UpdateExtracurricularRequest $request, Extracurricular $extracurricular)
    {
        //
    }

    public function destroy(Extracurricular $extracurricular)
    {
        //
    }
}
