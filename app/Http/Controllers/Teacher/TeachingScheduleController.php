<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ScheduleOfSubject;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TeachingScheduleController extends Controller
{
    public function index(): View
    {
        $teachingSchedules = ScheduleOfSubject::with('classroom', 'teacher.user', 'course')->where('teacher_id', auth()->user()->teacher->id)->latest()->filter(request(['search']))->paginate(10);

        return view('teachers.teaching-schedules.index', compact('teachingSchedules'));
    }
}
