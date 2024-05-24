<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\SchoolYear;
use App\Models\Status;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusIds = Status::pluck('id')->toArray();

        $student = User::create([
            'status_id' => $statusIds[0],
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('student')
        ]);

        $student->assignRole('Student');
        $classroomIds = Classroom::pluck('id')->toArray();
        $schoolYearids = SchoolYear::pluck('id')->toArray();

        Student::create([
            'user_id' => $student->id,
            'classroom_id' => $classroomIds[0],
            'school_year_id' => $schoolYearids[0],
            'identification_number' => '19200850'
        ]);
    }
}
