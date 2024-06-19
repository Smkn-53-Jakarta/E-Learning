<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\ScheduleOfSubject;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(ScheduleOfSubject $scheduleOfSubject): View
    {
        $materials = Material::latest()->where('schedule_of_subject_id', $scheduleOfSubject->id)->filter(request(['search']))->paginate(10);

        return view('students.materials.index', compact('scheduleOfSubject', 'materials'));
    }
}
