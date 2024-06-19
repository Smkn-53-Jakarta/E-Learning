<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ScheduleOfSubject;
use Illuminate\Contracts\View\View;

class ScheduleOfSubjectController extends Controller
{
    public function index(): View
    {
        $scheduleOfSubjects = ScheduleOfSubject::with('classroom', 'teacher.user', 'course')->where('classroom_id', auth()->user()->student->classroom->id)->latest()->filter(request(['search']))->paginate(10);

        return view('students.schedule-of-subjects.index', compact('scheduleOfSubjects'));
    }
}
