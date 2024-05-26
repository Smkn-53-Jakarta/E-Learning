<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleOfSubject\StoreScheduleOfSubjectRequest;
use App\Http\Requests\ScheduleOfSubject\UpdateScheduleOfSubjectRequest;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\ScheduleOfSubject;
use App\Models\Teacher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ScheduleOfSubjectController extends Controller
{
    public function index(): View
    {
        $scheduleOfSubjectsTrashed = ScheduleOfSubject::onlyTrashed()->count();
        $scheduleOfSubjects = ScheduleOfSubject::with('classroom', 'teacher.user', 'course')->latest()->filter(request(['search']))->paginate(10);

        return view('admin.schedule-of-subjects.index', compact('scheduleOfSubjectsTrashed', 'scheduleOfSubjects'));
    }

    public function create(): View
    {
        $classrooms = Classroom::latest()->get();
        $teachers = Teacher::with('user')->latest()->get();
        $courses = Course::latest()->get();

        return view('admin.schedule-of-subjects.create', compact('classrooms', 'teachers', 'courses'));
    }

    public function store(StoreScheduleOfSubjectRequest $request): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            ScheduleOfSubject::create($data);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute())->with([
                'message' => 'Jadwal mata pelajaran berhasil ditambahkan',
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

    public function show(ScheduleOfSubject $scheduleOfSubject)
    {
        //
    }

    public function edit(ScheduleOfSubject $scheduleOfSubject): View
    {
        $classrooms = Classroom::latest()->get();
        $teachers = Teacher::with('user')->latest()->get();
        $courses = Course::latest()->get();

        return view('admin.schedule-of-subjects.edit', compact('classrooms', 'teachers', 'courses', 'scheduleOfSubject'));
    }

    public function update(UpdateScheduleOfSubjectRequest $request, ScheduleOfSubject $scheduleOfSubject): RedirectResponse
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $scheduleOfSubject->update($data);

            DB::commit();
            return redirect(RoutingHelper::updateToIndexRoute())->with([
                'message' => 'Jadwal mata pelajaran berhasil diubah',
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

    public function destroy(ScheduleOfSubject $scheduleOfSubject): RedirectResponse
    {
        $scheduleOfSubject->delete();

        return back()->with([
            'message' => 'Jadwal mata pelajaran berhasil dihapus',
            'status' => 'success',
        ]);
    }
}
