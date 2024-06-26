<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AttendanceRecapController extends Controller
{
    public function index(): View
    {
        return view ('students.attendances-recaps.index');
    }
}
