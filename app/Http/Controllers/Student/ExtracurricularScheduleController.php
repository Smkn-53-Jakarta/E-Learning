<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ExtracurricularScheduleController extends Controller
{
    public function index(): View
    {
        return view('students.extracurricular-schedules.index');
    }
    
}
