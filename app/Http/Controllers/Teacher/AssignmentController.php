<?php

namespace App\Http\Controllers\Teacher;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Assignment\StoreAssignmentRequest;
use App\Http\Requests\Assignment\UpdateAssignmentRequest;
use App\Models\Assignment;
use App\Models\ScheduleOfSubject;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index(ScheduleOfSubject $scheduleOfSubject): View
    {
        $assignmentsTrashed = Assignment::onlyTrashed()->count();
        $assignments = Assignment::latest()->where('schedule_of_subject_id', $scheduleOfSubject->id)->filter(request(['search']))->paginate(10);

        return view('teachers.assignments.index', compact('scheduleOfSubject', 'assignmentsTrashed', 'assignments'));
    }

    public function create(ScheduleOfSubject $scheduleOfSubject): View
    {
        return view('teachers.assignments.create', compact('scheduleOfSubject'));
    }

    public function store(StoreAssignmentRequest $request, ScheduleOfSubject $scheduleOfSubject): RedirectResponse
    {
        $data = $request->validated();
        $deadline = explode('-', $data['deadline']);
        $data['start_date'] = date('Y-m-d H:i', strtotime(trim($deadline[0])));
        $data['end_date'] = date('Y-m-d H:i', strtotime($deadline[1]));
        $data['schedule_of_subject_id'] = $scheduleOfSubject->id;

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('materials', 'public');;
        }

        try {
            DB::beginTransaction();

            Assignment::create($data);

            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute($scheduleOfSubject->id))->with([
                'message' => 'Tugas berhasil ditambahkan',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            if (isset($data['file'])) {
                Storage::disk('public')->delete($data['file']);
            }

            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function show(ScheduleOfSubject $scheduleOfSubject): View
    {
        return view('teachers.assignments.show', compact('scheduleOfSubject'));
    }

    public function edit(ScheduleOfSubject $scheduleOfSubject, Assignment $assignment): View
    {
        return view('teachers.assignments.edit', compact('scheduleOfSubject', 'assignment'));
    }

    public function update(UpdateAssignmentRequest $request, ScheduleOfSubject $scheduleOfSubject, Assignment $assignment): RedirectResponse
    {
        $data = $request->validated();
        $deadline = explode('-', $data['deadline']);
        $data['start_date'] = date('Y-m-d H:i', strtotime(trim($deadline[0])));
        $data['end_date'] = date('Y-m-d H:i', strtotime($deadline[1]));
        $data['schedule_of_subject_id'] = $scheduleOfSubject->id;

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('materials', 'public');;
            $oldFile = $assignment->file;
        }

        try {
            DB::beginTransaction();

            $assignment->update($data);

            DB::commit();

            if (isset($oldFile)) {
                Storage::disk('public')->delete($oldFile);
            }

            return redirect(RoutingHelper::updateToIndexRoute($scheduleOfSubject->id))->with([
                'message' => 'Tugas berhasil diubah',
                'status' => 'success',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            if (isset($data['file'])) {
                Storage::disk('public')->delete($data['file']);
            }
            dd($th->getMessage());
            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function destroy(ScheduleOfSubject $scheduleOfSubject, Assignment $assignment): RedirectResponse
    {
        $assignment->delete();

        return back()->with([
            'message' => 'Tugas berhasil dihapus',
            'status' => 'success',
        ]);
    }

    public function trashed(ScheduleOfSubject $scheduleOfSubject): View
    {
        $assignments = Assignment::latest()->onlyTrashed()->where('schedule_of_subject_id', $scheduleOfSubject->id)->filter(request(['search']))->paginate(10);

        return view('teachers.assignments.trashed', compact('assignments', 'scheduleOfSubject'));
    }

    public function restore($scheduleOfSubjectId, $assignmentId): RedirectResponse
    {
        Assignment::withTrashed()->findOrFail($assignmentId)->restore();

        return redirect(RoutingHelper::restoreToIndex($scheduleOfSubjectId))->with([
            'message' => 'Tugas berhasil dipulihkan',
            'status' => 'success',
        ]);
    }

    public function forceDelete($scheduleOfSubjectId, $assignmentId): RedirectResponse
    {
        $assignment = Assignment::withTrashed()->findOrFail($assignmentId);
        $assignment->forceDelete();

        Storage::disk('public')->delete($assignment->file);

        return redirect(RoutingHelper::forceDeleteToIndex($scheduleOfSubjectId))->with([
            'message' => 'Tugas berhasil dihapus',
            'status' => 'success',
        ]);
    }
}
