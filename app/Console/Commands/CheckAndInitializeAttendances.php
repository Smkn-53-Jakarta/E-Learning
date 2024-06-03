<?php

namespace App\Console\Commands;

use App\Models\ScheduleOfSubject;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckAndInitializeAttendances extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-and-initialize-attendances';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $checkTime = $now->copy()->addHour()->format('H:i');
        $currentDay = $now->locale('id')->dayName;

        $schedules = ScheduleOfSubject::where('day', $currentDay)
            ->whereTime('start_time', '<=', $checkTime)
            ->whereTime('end_time', '>=', $checkTime)
            ->get();

        foreach ($schedules as $schedule) {
            $existingStudentAttendances = StudentAttendance::where('schedule_of_subject_id', $schedule->id)
                ->where('attendance_time', $now)
                ->exists();

            if (!$existingStudentAttendances) {
                $students = Student::where('classroom_id', $$schedule->classroom_id)->get();

                foreach ($students as $user) {
                    StudentAttendance::create([
                        'student_id' => $user->id,
                        'status' => 'Tidak Hadir',
                        'attendance_time' => $now
                    ]);
                }
            }
        }

        $this->info('Checked schedules and initialized attendance records if necessary.');
    }
}
