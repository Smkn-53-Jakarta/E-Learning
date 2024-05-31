<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ScheduleOfSubject;
use App\Models\Student;
use Carbon\Carbon;


class AttendanceController extends Controller
{
    public function index(ScheduleOfSubject $scheduleOfSubject)
    {
        $now = Carbon::now();
        $startTime = Carbon::parse($scheduleOfSubject->start_time);
        $endTime = Carbon::parse($scheduleOfSubject->end_time);

        if ($endTime->lessThan($startTime)) {
            $endTime->addDay();
        }

        $scheduleDay = $scheduleOfSubject->day;
        $todayDay = $now->locale('id')->dayName;

        if ($todayDay !== $scheduleDay || $now->lessThan($startTime) || $now->greaterThan($endTime)) {
            return redirect()->route('teacher-teaching-schedules.index')->with([
                'message' => 'Mata pelajaran belum dimulai!',
                'status' => 'warning'
            ]);
        }

        $students = Student::with('user')->whereHas('user.status', function ($query) {
            $query->where('name', 'Aktif');
        })->where('classroom_id', $scheduleOfSubject->classroom_id)->get();

        return view('teachers.teaching-schedules.attendances', compact('scheduleOfSubject', 'students'));
    }
}
