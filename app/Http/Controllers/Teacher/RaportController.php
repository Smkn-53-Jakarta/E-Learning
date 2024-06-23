<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Raport\StoreRaportRequest;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Raport;
use App\Models\ScheduleOfSubject;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class RaportController extends Controller
{
    public function index(): View
    {
        $teachingSchedules = ScheduleOfSubject::with('classroom', 'teacher.user', 'course')->where('teacher_id', auth()->user()->teacher->id)->latest()->filter(request(['search']))->paginate(10);

        return view('teachers.e-raports.index', compact('teachingSchedules'));
    }

    public function create()
    {
        //
    }

    public function store(StoreRaportRequest $request, Course $course, Classroom $classroom)
    {
        $raports = array_filter($request->validated()['raports'], function ($raport) {
            return !is_null($raport['average_value']) || !is_null($raport['uts']) || !is_null($raport['uas']) || !is_null($raport['information']);
        });

        try {
            DB::beginTransaction();

            foreach ($raports as $raport) {
                Raport::updateOrCreate(
                    ['course_id' => $course->id, 'student_id' => $raport['student_id']],
                    [
                        'average_value' => $raport['average_value'],
                        'uts' => $raport['uts'],
                        'uas' => $raport['uas'],
                        'information' => $raport['information'],
                    ]
                );
            }

            DB::commit();

            return redirect()->back()->with([
                'message' => 'Raport berhasil diubah',
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

    public function show(Course $course, Classroom $classroom): View
    {
        $scheduleOfSubjectIds = ScheduleOfSubject::where('classroom_id', $classroom->id)->where('course_id', $course->id)->pluck('id')->all();
        $students = Student::with(['user', 'submissions' => function ($query) use ($scheduleOfSubjectIds) {
            $query->whereIn('schedule_of_subject_id', $scheduleOfSubjectIds);
        }])->latest()->where('classroom_id', $classroom->id)->paginate(50);

        $students->getCollection()->transform(function ($student) use ($course) {
            $student->raport = $student->raports->where('course_id', $course->id)->first();
            $student->average_value = $student->submissions->avg('value');
            return $student;
        });

        return view('teachers.e-raports.show', compact('course', 'classroom', 'students'));
    }
}