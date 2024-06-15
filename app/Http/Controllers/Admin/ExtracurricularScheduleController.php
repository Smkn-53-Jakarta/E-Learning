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
use Illuminate\Http\RedirectResponse;
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

    public function edit(ExtracurricularSchedule $extracurricularSchedule): View
    {
        $extracurriculars = Extracurricular::latest()->get();
        $students = Student::with('user', 'classroom')->latest()->get();
        $coachs = User::role('coach')->get();

        return view('admin.extracurricular-schedules.edit', compact('extracurriculars', 'students', 'coachs', 'extracurricularSchedule'));
    }

    public function update(UpdateExtracurricularScheduleRequest $request, ExtracurricularSchedule $extracurricularSchedule): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $extracurricularSchedule->update($data);
            $extracurricularSchedule->members()->sync($data['members']);

            DB::commit();
            return redirect(RoutingHelper::updateToIndexRoute())->with([
                'message' => 'Jadwal ekstrakurikuler berhasil diubah',
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

    public function destroy(ExtracurricularSchedule $extracurricularSchedule): RedirectResponse
    {
        $extracurricularSchedule->delete();

        return back()->with([
            'message' => 'Jadwal ekstrakurikuler berhasil dihapus',
            'status' => 'success',
        ]);
    }

    public function trashed(): View
    {
        $extracurricularSchedules = ExtracurricularSchedule::with('extracurricular', 'coach', 'members')->latest()->onlyTrashed()->filter(request(['search']))->paginate(10);

        return view('admin.extracurricular-schedules.trashed', compact('extracurricularSchedules'));
    }

    public function restore($id): RedirectResponse
    {
        ExtracurricularSchedule::withTrashed()->findOrFail($id)->restore();

        return redirect(RoutingHelper::restoreToIndex())->with([
            'message' => 'Jadwal ekstrakurikuler berhasil dipulihkan',
            'status' => 'success',
        ]);
    }
}
