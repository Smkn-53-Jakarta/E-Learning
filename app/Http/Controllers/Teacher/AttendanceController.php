<?php

namespace App\Http\Controllers\Teacher;

use App\Helpers\RoutingHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherAttendance\StoreTeacherAttendanceRequest;
use App\Models\ScheduleOfSubject;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\TeacherAttendance;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

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

        $students = Student::with(['user', 'studentAttendance' => function ($query) use ($scheduleOfSubject, $now) {
            $query->where('schedule_of_subject_id', $scheduleOfSubject->id)
                ->whereDate('attendance_time', $now->format('Y-m-d'));
        }])->whereHas('user.status', function ($query) {
            $query->where('name', 'Aktif');
        })->where('classroom_id', $scheduleOfSubject->classroom_id)->get();

        $existingStudentAttendances = StudentAttendance::where('schedule_of_subject_id', $scheduleOfSubject->id)
            ->whereDate('attendance_time', $now->format('Y-m-d'))
            ->exists();

        $teacherAttendance = TeacherAttendance::where('schedule_of_subject_id', $scheduleOfSubject->id)->whereDate('attendance_time', $now->format('Y-m-d'))->first();

        if (!$existingStudentAttendances) {
            foreach ($students as $student) {
                StudentAttendance::create([
                    'student_id' => $student->id,
                    'schedule_of_subject_id' => $scheduleOfSubject->id,
                    'attendance_time' => $now,
                    'status' => 'Hadir',
                ]);
            }
        }

        $attendanceCounts = StudentAttendance::select('status', DB::raw('count(*) as total'))
            ->where('schedule_of_subject_id', $scheduleOfSubject->id)
            ->whereDate('attendance_time', $now->format('Y-m-d'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $totalPresent = $attendanceCounts->get('Hadir', 0);
        $totalAbsent = $attendanceCounts->get('Alfa', 0);
        $totalPermission = $attendanceCounts->get('Izin', 0);
        $totalSick = $attendanceCounts->get('Sakit', 0);

        return view('teachers.teaching-schedules.attendances', compact('scheduleOfSubject', 'students', 'teacherAttendance', 'totalPresent', 'totalAbsent', 'totalPermission', 'totalSick'));
    }

    public function store(ScheduleOfSubject $scheduleOfSubject, StoreTeacherAttendanceRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $now = Carbon::now();

        $existingTeacherAttendances = TeacherAttendance::where('schedule_of_subject_id', $scheduleOfSubject->id)
            ->whereDate('attendance_time', $now->format('Y-m-d'))
            ->first();;

        try {
            DB::beginTransaction();

            if (!$existingTeacherAttendances) {
                TeacherAttendance::create([
                    'teacher_id' => $scheduleOfSubject->teacher_id,
                    'schedule_of_subject_id' => $scheduleOfSubject->id,
                    'attendance_time' => $now,
                    'status' => $data['status'],
                    'information' => $data['information'],
                    'substitute_teacher' => $data['substitute_teacher'],
                ]);
            } else {
                $existingTeacherAttendances->update([
                    'status' => $data['status'],
                    'information' => $data['information'],
                    'substitute_teacher' => $data['substitute_teacher'],
                ]);
            }
            DB::commit();
            return redirect(RoutingHelper::storeToIndexRoute($scheduleOfSubject->id))->with([
                'message' => 'Status kehadiran berhasil diubah',
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
