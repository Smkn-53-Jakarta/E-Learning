<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduleOfSubject;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class MonitoringController extends Controller
{
    public function index(): View
    {
        $now = Carbon::now();
        $todayDate = date('Y-m-d');
        $todayDay = $now->locale('id')->dayName;
        $scheduleOfSubjects = ScheduleOfSubject::with(['classroom', 'teacher.user', 'course', 'teacherAttendances' => function ($query) use ($todayDate) {
            $query->whereDate('attendance_time', $todayDate);
        }])->where('day', $todayDay)->latest()->get();

        $scheduleOfSubjects->each(function ($schedule) {
            $schedule->hasAttended = $schedule->teacherAttendances->contains('teacher_id', $schedule->teacher->id);
        });

        return view('admin.monitoring.index', compact('scheduleOfSubjects'));
    }
}
