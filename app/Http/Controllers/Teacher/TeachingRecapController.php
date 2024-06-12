<?php

namespace App\Http\Controllers\Teacher;

use App\Helpers\SemesterHelper;
use App\Http\Controllers\Controller;
use App\Models\ScheduleOfSubject;
use App\Models\TeacherAttendance;
use Illuminate\Contracts\View\View;

class TeachingRecapController extends Controller
{
    public function index(): View
    {
        $teachingSchedules = ScheduleOfSubject::with('classroom', 'teacher.user', 'course')->where('teacher_id', auth()->user()->teacher->id)->latest()->filter(request(['search']))->paginate(10);

        return view('teachers.teaching-recaps.index', compact('teachingSchedules'));
    }

    public function show(ScheduleOfSubject $scheduleOfSubject): View
    {
        $teacherAttendances = TeacherAttendance::with('scheduleOfSubject', 'scheduleOfSubject.course', 'scheduleOfSubject.classroom')->where('schedule_of_subject_id', $scheduleOfSubject->id)
            ->whereBetween('attendance_time', [SemesterHelper::getStartDate(), SemesterHelper::getEndDate()])->paginate(10);

        return view('teachers.teaching-recaps.show', compact('teacherAttendances'));
    }
}
