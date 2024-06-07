<?php

namespace App\Http\Controllers\Teacher;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Assignment\StoreAssignmentRequest;
use App\Http\Requests\Assignment\UpdateAssignmentRequest;
use App\Models\Assignment;
use App\Models\ScheduleOfSubject;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index(ScheduleOfSubject $scheduleOfSubject): View
    {
        $assignmentsTrashed = Assignment::onlyTrashed()->count();
        $assignments = Assignment::latest()->filter(request(['search']))->paginate(10);

        return view('teachers.assignments.index', compact('scheduleOfSubject', 'assignmentsTrashed', 'assignments'));
    }

    public function create(ScheduleOfSubject $scheduleOfSubject): View
    {
        return view('teachers.assignments.create', compact('scheduleOfSubject'));
    }

    public function store(StoreAssignmentRequest $request, ScheduleOfSubject $scheduleOfSubject)
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
            dd($th->getMessage());
            return redirect()->back()->withInput()->with([
                'message' => trans('message.error'),
                'status' => 'danger',
            ]);
        }
    }

    public function show(string $id): View
    {
        return view('teachers.assignments.show');
    }

    public function edit(string $id): View
    {
        return view('teachers.assignments.edit');
    }

    public function update(UpdateAssignmentRequest $request, string $id)
    {
        //return view('teachers.assignments.update');
    }

    public function destroy(string $id)
    {
        //return view('teachers.assignments.index');
    }

    public function trashed(): View
    {
        return view('teachers.assignments.trashed');
    }
}
