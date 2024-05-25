<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleOfSubject\StoreScheduleOfSubjectRequest;
use App\Http\Requests\ScheduleOfSubject\UpdateScheduleOfSubjectRequest;
use App\Models\ScheduleOfSubject;
use Illuminate\Contracts\View\View;

class ScheduleOfSubjectController extends Controller
{
    public function index(): View
    {
        return view('admin.schedule-of-subjects.index');
    }

    public function create()
    {
        //
    }

    public function store(StoreScheduleOfSubjectRequest $request)
    {
        //
    }

    public function show(ScheduleOfSubject $scheduleOfSubject)
    {
        //
    }

    public function edit(ScheduleOfSubject $scheduleOfSubject)
    {
        //
    }

    public function update(UpdateScheduleOfSubjectRequest $request, ScheduleOfSubject $scheduleOfSubject)
    {
        //
    }

    public function destroy(ScheduleOfSubject $scheduleOfSubject)
    {
        //
    }
}
