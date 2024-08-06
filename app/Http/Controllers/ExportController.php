<?php

namespace App\Http\Controllers;

use App\Helpers\SemesterHelper;
use App\Models\Course;
use App\Models\Extracurricular;
use App\Models\RaportNote;
use App\Models\ScheduleOfSubject;
use App\Models\Student;
use App\Models\StudentAttendance;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportRaport(Student $student)
    {
        $startDate = SemesterHelper::getStartDate();
        $endDate = SemesterHelper::getEndDate();
        $scheduleOfSubjects = ScheduleOfSubject::where('classroom_id', $student->classroom_id)
            ->select('course_id')
            ->distinct()
            ->get();

        $courseIds = $scheduleOfSubjects->pluck('course_id');

        $courses = Course::with(['raports' => function ($query) use ($student) {
            $query->where('student_id', $student->id);
        }])->whereIn('id', $courseIds)->get();

        $courses->each(function ($course) {
            $course->raport = $course->raports->first();
            unset($course->raports);
        });

        $totalAlpha = StudentAttendance::where('student_id', $student->id)
            ->where('status', 'Alfa')
            ->whereBetween('attendance_time', [SemesterHelper::getStartDate(), SemesterHelper::getEndDate()])
            ->count();

        $totalPermission = StudentAttendance::where('student_id', $student->id)
            ->where('status', 'Izin')
            ->whereBetween('attendance_time', [SemesterHelper::getStartDate(), SemesterHelper::getEndDate()])
            ->count();

        $totalSick = StudentAttendance::where('student_id', $student->id)
            ->where('status', 'Sakit')
            ->whereBetween('attendance_time', [SemesterHelper::getStartDate(), SemesterHelper::getEndDate()])
            ->count();

        $extracurriculars = Extracurricular::with(['extracurricularValues' => function ($query) use ($student) {
            $query->where('student_id', $student->id);
        }])->latest()->whereHas('extracurricularSchedules.members', function ($query) use ($student) {
            $query->where('student_id', $student->id);
        })->get();

        $extracurriculars->each(function ($course) {
            $course->extracurricularValue = $course->extracurricularValues->first();
            unset($course->extracurricularValues);
        });

        $homeRoomNote = RaportNote::where('student_id', $student->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->first();

        ini_set('max_execution_time', 6000);
        $pdf = Pdf::loadView('exports.raport', compact('courses', 'student', 'totalAlpha', 'totalPermission', 'totalSick', 'extracurriculars', 'homeRoomNote'))->setPaper('a4');

        return $pdf->download('Raport ' . $student->user->name . '.pdf');
    }

    public function exportStudentAttendances(ScheduleOfSubject $scheduleOfSubject)
    {
        $students = Student::with(['user', 'studentAttendances' => function ($query) use ($scheduleOfSubject) {
            $query->where('schedule_of_subject_id', $scheduleOfSubject->id)
                ->whereBetween('attendance_time', [SemesterHelper::getStartDate(), SemesterHelper::getEndDate()]);
        }])->whereHas('user.status', function ($query) {
            $query->where('name', 'Aktif');
        })->where('classroom_id', $scheduleOfSubject->classroom_id)->get();

        $totalMeetings = StudentAttendance::where('schedule_of_subject_id', $scheduleOfSubject->id)
            ->whereBetween('attendance_time', [SemesterHelper::getStartDate(), SemesterHelper::getEndDate()])
            ->select('attendance_time')
            ->distinct()
            ->get();

        ini_set('max_execution_time', 6000);
        $pdf = Pdf::loadView('exports.student-attendances', compact('scheduleOfSubject', 'students', 'totalMeetings'))->setPaper('a4', 'landscape');

        return $pdf->download('Rekap Absensi ' . $scheduleOfSubject->classroom->name . '.pdf');
    }
}
