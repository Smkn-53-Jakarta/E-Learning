<?php

namespace App\Http\Controllers\Teacher;

use App\Helpers\SemesterHelper;
use App\Http\Controllers\Controller;
use App\Models\ScheduleOfSubject;
use App\Models\Student;
use App\Models\StudentAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceRecapController extends Controller
{
    public function index(ScheduleOfSubject $scheduleOfSubject)
    {
        $students = Student::with(['user', 'studentAttendances' => function ($query) use ($scheduleOfSubject) {
            $query->where('schedule_of_subject_id', $scheduleOfSubject->id)
                ->whereBetween('attendance_time', [SemesterHelper::getStartDate(), SemesterHelper::getEndDate()]);
        }])->whereHas('user.status', function ($query) {
            $query->where('name', 'Aktif');
        })->where('classroom_id', $scheduleOfSubject->classroom_id)->get();

        $totalMeetings = StudentAttendance::where('schedule_of_subject_id', $scheduleOfSubject->id)
            ->whereBetween('attendance_time', [SemesterHelper::getStartDate(), SemesterHelper::getEndDate()])
            ->select('attendance_time')
            ->distinct()
            ->get();

        return view('teachers.teaching-schedules.attendances-recap', compact('scheduleOfSubject', 'students', 'totalMeetings'));
    }
}
