<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ScheduleOfSubject;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ScheduleOfSubjectController extends Controller
{
    public function index(): View
    {
        return view('students.schedule-of-subjects.index');
    }


    public function show(ScheduleOfSubject $scheduleOfSubject)
    {
        //
    }

}
