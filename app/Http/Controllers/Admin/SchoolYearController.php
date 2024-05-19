<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolYear\StoreSchoolyearRequest;
use App\Http\Requests\SchoolYear\UpdateSchoolyearRequest;
use App\Models\SchoolYear;
use Illuminate\Contracts\View\View;

class SchoolYearController extends Controller
{
    public function index(): View
    {
        $schoolYearsTrashed = SchoolYear::onlyTrashed()->count();
        $schoolYears = SchoolYear::latest()->filter(request(['search']))->paginate(10);

        return view('admin.school-years.index', compact('schoolYearsTrashed', 'schoolYears'));
    }

    public function create(): View
    {
        return view('admin.school-years.create');
    }

    public function store(StoreSchoolyearRequest $request)
    {
        //
    }

    public function show(SchoolYear $schoolYear)
    {
        //
    }

    public function edit(SchoolYear $schoolYear): View
    {
        return view('admin.school-years.edit', compact('schoolYear'));
    }

    public function update(UpdateSchoolyearRequest $request, SchoolYear $schoolYear)
    {
        //
    }

    public function destroy(SchoolYear $schoolYear)
    {
        //
    }
}
