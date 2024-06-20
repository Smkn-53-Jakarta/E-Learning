<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assesment\StoreAssesmentRequest;
use App\Models\Assignment;
use App\Models\ScheduleOfSubject;
use App\Models\Submission;
use Illuminate\Support\Facades\DB;

class SubmissionController extends Controller
{
    public function store(StoreAssesmentRequest $request, ScheduleOfSubject $scheduleOfSubject, Assignment $assignment)
    {
        $assesments = array_filter($request->validated()['submissions'], function ($submission) {
            return !is_null($submission['value']);
        });

        try {
            DB::beginTransaction();

            foreach ($assesments as $assesment) {
                Submission::updateOrCreate(
                    ['assignment_id' => $assignment->id, 'student_id' => $assesment['student_id']],
                    ['value' => $assesment['value'], 'comment' => $assesment['comment']]
                );
            }

            DB::commit();

            return redirect()->back()->with([
                'message' => 'Nilai berhasil diubah',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }
}
