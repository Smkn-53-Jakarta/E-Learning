<?php

namespace App\Http\Controllers\Student;

use App\Helpers\SemesterHelper;
use App\Http\Controllers\Controller;
use App\Models\ScheduleOfSubject;
use App\Models\StudentAttendance;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AttendanceRecapController extends Controller
{
    public function index(ScheduleOfSubject $scheduleOfSubject): View
    {
        $attendanceRecaps = StudentAttendance::where('student_id', auth()->user()->id)->where('schedule_of_subject_id', $scheduleOfSubject->id)->whereBetween('attendance_time', [SemesterHelper::getStartDate(), SemesterHelper::getEndDate()])->get();
        dd($attendanceRecaps);
        return view('students.attendances-recaps.index', compact('scheduleOfSubject'));
    }
}
