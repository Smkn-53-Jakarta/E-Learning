<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ExtracurricularSchedule;
use Illuminate\Contracts\View\View;

class ExtracurricularScheduleController extends Controller
{
    public function index(): View
    {
        $extracurricularSchedules = ExtracurricularSchedule::latest()->whereHas('members', function ($query) {
            $query->where('student_id', auth()->user()->student->id);
        })->paginate(10);

        return view('students.extracurricular-schedules.index', compact('extracurricularSchedules'));
    }
}
