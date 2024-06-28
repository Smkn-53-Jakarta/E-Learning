<?php

namespace App\Http\Controllers\Student;

use App\Helpers\SemesterHelper;
use App\Http\Controllers\Controller;
use App\Models\ScheduleOfSubject;
use App\Models\StudentAttendance;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AttendanceRecapController extends Controller
{
    public function index(ScheduleOfSubject $scheduleOfSubject): View
    {
        $date = Carbon::today()->toDateString();
        $attendanceRecaps = StudentAttendance::where('student_id', auth()->user()->student->id)->where('schedule_of_subject_id', $scheduleOfSubject->id)->whereBetween('attendance_time', [SemesterHelper::getStartDate(), SemesterHelper::getEndDate()])->paginate(20);

        $hasAttended = StudentAttendance::where('student_id', auth()->user()->student->id)
            ->where('schedule_of_subject_id', $scheduleOfSubject->id)
            ->whereDate('attendance_time', $date)
            ->first();

        return view('students.attendances-recaps.index', compact('scheduleOfSubject', 'attendanceRecaps', 'hasAttended'));
    }
}
