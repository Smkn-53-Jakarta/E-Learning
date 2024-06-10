<?php

namespace App\Http\Controllers\Teacher;

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
        $now = Carbon::now();

        $oddSemester = '2024-01-01 - 2024-06-30';
        $evenSemester = '2024-07-01 - 2024-12-30';

        list($evenStart, $evenEnd) = explode(' - ', $evenSemester);
        list($oddStart, $oddEnd) = explode(' - ', $oddSemester);

        $evenStart = Carbon::parse($evenStart);
        $evenEnd = Carbon::parse($evenEnd);
        $oddStart = Carbon::parse($oddStart);
        $oddEnd = Carbon::parse($oddEnd);

        $isInEvenSemester = $now->between($evenStart, $evenEnd);
        $isInOddSemester = $now->between($oddStart, $oddEnd);

        $startDate = $isInEvenSemester ? $evenStart : $oddStart;
        $endDate = $isInEvenSemester ? $evenEnd : $oddEnd;

        $students = Student::with(['user', 'studentAttendances' => function ($query) use ($scheduleOfSubject, $startDate, $endDate) {
            $query->where('schedule_of_subject_id', $scheduleOfSubject->id)
                ->whereBetween('attendance_time', [$startDate, $endDate]);
        }])->whereHas('user.status', function ($query) {
            $query->where('name', 'Aktif');
        })->where('classroom_id', $scheduleOfSubject->classroom_id)->get();

        $totalMeetings = StudentAttendance::where('schedule_of_subject_id', $scheduleOfSubject->id)
            ->whereBetween('attendance_time', [$startDate, $endDate])
            ->select('attendance_time')
            ->distinct()
            ->get();

        return view('teachers.teaching-schedules.attendances-recap', compact('scheduleOfSubject', 'students', 'totalMeetings'));
    }
}
