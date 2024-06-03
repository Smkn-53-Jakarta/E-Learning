<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ScheduleOfSubject;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\TeacherAttendance;
use Carbon\Carbon;


class AttendanceController extends Controller
{
    public function index(ScheduleOfSubject $scheduleOfSubject)
    {
        $now = Carbon::now();
        $startTime = Carbon::parse($scheduleOfSubject->start_time);
        $endTime = Carbon::parse($scheduleOfSubject->end_time);

        if ($endTime->lessThan($startTime)) {
            $endTime->addDay();
        }

        $scheduleDay = $scheduleOfSubject->day;
        $todayDay = $now->locale('id')->dayName;

        if ($todayDay !== $scheduleDay || $now->lessThan($startTime) || $now->greaterThan($endTime)) {
            return redirect()->route('teacher-teaching-schedules.index')->with([
                'message' => 'Mata pelajaran belum dimula`i!',
                'status' => 'warning'
            ]);
        }

        $students = Student::with('user')->whereHas('user.status', function ($query) {
            $query->where('name', 'Aktif');
        })->where('classroom_id', $scheduleOfSubject->classroom_id)->get();

        $existingStudentAttendances = StudentAttendance::where('schedule_of_subject_id', $scheduleOfSubject->id)
            ->where('attendance_time', $now)
            ->exists();

        $existingTeacherAttendances = TeacherAttendance::where('schedule_of_subject_id', $scheduleOfSubject->id)
            ->where('attendance_time', $now)
            ->exists();

        if (!$existingStudentAttendances) {
            foreach ($students as $student) {
                StudentAttendance::create([
                    'student_id' => $student->id,
                    'schedule_of_subject_id' => $scheduleOfSubject->id,
                    'attendance_time' => $now,
                    'status' => 'Tidak Hadir',
                ]);
            }
        }

        if (!$existingTeacherAttendances) {
            TeacherAttendance::create([
                'teacher_id' => $scheduleOfSubject->teacher_id,
                'schedule_of_subject_id' => $scheduleOfSubject->id,
                'attendance_time' => $now,
                'status' => 'Tidak Hadir',
            ]);
        }

        return view('teachers.teaching-schedules.attendances', compact('scheduleOfSubject', 'students'));
    }
}