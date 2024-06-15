<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExtracurricularSchedule\StoreExtracurricularScheduleRequest;
use App\Http\Requests\ExtracurricularSchedule\UpdateExtracurricularScheduleRequest;
use App\Models\Extracurricular;
use App\Models\ExtracurricularSchedule;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ExtracurricularScheduleController extends Controller
{
    public function index(): View
    {
        $extracurricularSchedulesTrashed = ExtracurricularSchedule::onlyTrashed()->count();
        $extracurricularSchedules = ExtracurricularSchedule::with('extracurricular', 'coach', 'members')->latest()->filter(request(['search']))->paginate(10);

        return view('admin.extracurricular-schedules.index', compact('extracurricularSchedulesTrashed', 'extracurricularSchedules'));
    }

    public function create(): View
    {
        $extracurriculars = Extracurricular::latest()->get();
        $students = Student::with('user', 'classroom')->latest()->get();
        $coachs = User::role('coach')->get();

        return view('admin.extracurricular-schedules.create', compact('extracurriculars', 'students', 'coachs'));
    }

    public function store(StoreExtracurricularScheduleRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $extracurricularSchedule = ExtracurricularSchedule::create($data);
            $extracurricularSchedule->members()->attach($data['members']);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute())->with([
                'message' => 'Jadwal ekstrakurikuler berhasil ditambahkan',
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

    public function show(ExtracurricularSchedule $extracurricularSchedule)
    {
        //
    }

    public function edit(ExtracurricularSchedule $extracurricularSchedule)
    {
        //
    }

    public function update(UpdateExtracurricularScheduleRequest $request, ExtracurricularSchedule $extracurricularSchedule)
    {
        //
    }

    public function destroy(ExtracurricularSchedule $extracurricularSchedule)
    {
        //
    }
}
