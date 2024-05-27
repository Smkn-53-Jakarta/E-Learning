<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolYear\StoreSchoolyearRequest;
use App\Http\Requests\SchoolYear\UpdateSchoolyearRequest;
use App\Models\SchoolYear;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

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

    public function store(StoreSchoolyearRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            SchoolYear::create($data);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute())->with([
                'message' => 'Tahun pelajaran berhasil ditambahkan',
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
