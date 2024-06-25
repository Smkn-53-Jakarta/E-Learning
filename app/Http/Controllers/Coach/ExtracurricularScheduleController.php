<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Models\ExtracurricularSchedule;
use Illuminate\Contracts\View\View;

class ExtracurricularScheduleController extends Controller
{
    public function index(): View
    {
        $extracurricularSchedules = ExtracurricularSchedule::latest()->where('user_id', auth()->user()->id)->paginate(10);

        return view('students.extracurricular-schedules.index', compact('extracurricularSchedules'));
    }
}
