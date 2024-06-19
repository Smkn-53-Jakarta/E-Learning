<?php

namespace App\Http\Controllers\Student;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Submission\StoreSubmissionRequest;
use App\Http\Requests\Submission\UpdateSubmissionRequest;
use App\Models\Assignment;
use App\Models\ScheduleOfSubject;
use App\Models\Submission;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class SubmissionController extends Controller
{
    public function index(ScheduleOfSubject $scheduleOfSubject): View
    {
        $submissions = Submission::with('assignment')->latest()->where('schedule_of_subject_id', $scheduleOfSubject->id)->where('student_id', auth()->user()->student->id)->filter(request(['search']))->paginate(10);

        return view('students.submissions.index', compact('scheduleOfSubject', 'submissions'));
    }

    public function create(ScheduleOfSubject $scheduleOfSubject, Assignment $assignment): View
    {
        return view('students.submissions.create', compact('scheduleOfSubject', 'assignment'));
    }

    public function store(StoreSubmissionRequest $request, ScheduleOfSubject $scheduleOfSubject, Assignment $assignment)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            Submission::create([
                'schedule_of_subject_id' => $scheduleOfSubject->id,
                'assignment_id' => $assignment->id,
                'student_id' => auth()->user()->student->id,
                'link_drive' => $data['link_drive']
            ]);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute($scheduleOfSubject->id))->with([
                'message' => 'Tugas berhasil dikumpulkan',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function edit(ScheduleOfSubject $scheduleOfSubject, Assignment $assignment, Submission $submission): View
    {
        return view('students.submissions.edit', compact('scheduleOfSubject', 'assignment', 'submission'));
    }

    public function update(UpdateSubmissionRequest $request, ScheduleOfSubject $scheduleOfSubject, Assignment $assignment, Submission $submission)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $submission->update($data);

            DB::commit();
            return redirect(RoutingHelper::updateToIndexRoute($scheduleOfSubject->id))->with([
                'message' => 'Link drive berhasil diubah',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }
}
