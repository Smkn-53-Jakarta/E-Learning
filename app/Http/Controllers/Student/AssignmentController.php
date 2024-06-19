<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\ScheduleOfSubject;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index(ScheduleOfSubject $scheduleOfSubject): View
    {
        $assignments = Assignment::latest()->where('schedule_of_subject_id', $scheduleOfSubject->id)->filter(request(['search']))->paginate(10);

        return view('students.assignments.index', compact('scheduleOfSubject', 'assignments'));
    }

    public function download(ScheduleOfSubject $scheduleOfSubject, Assignment $assignment)
    {
        return Storage::disk('public')->download($assignment->file);
    }
}
