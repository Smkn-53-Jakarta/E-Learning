<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ScheduleOfSubject;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(): View
    {
        $now = Carbon::now();
        $todayDate = date('Y-m-d');
        $todayDay = $now->locale('id')->dayName;

        $scheduleOfSubjects = ScheduleOfSubject::with(['classroom', 'teacher.user', 'course', 'studentAttendances' => function ($query) use ($todayDate) {
            $query->whereDate('attendance_time', $todayDate);
        }])->where('classroom_id', auth()->user()->student->classroom->id)->where('day', $todayDay)->latest()->get();

        $scheduleOfSubjects->each(function ($schedule) {
            $schedule->hasAttended = $schedule->studentAttendances->contains('student_id', auth()->user()->student->id);
        });

        return view('students.dashboard', compact('scheduleOfSubjects'));
    }
}
