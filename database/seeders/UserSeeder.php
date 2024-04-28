<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        $admin->assignRole('Admin');

        $student = User::create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('student')
        ]);

        $student->assignRole('Student');

        $teacher = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('teacher')
        ]);

        $teacher->assignRole('Teacher');

        $classroomIds = Classroom::pluck('id')->toArray();
        $schoolYearids = SchoolYear::pluck('id')->toArray();

        Student::create([
            'user_id' => $student->id,
            'classroom_id' => $classroomIds[0],
            'school_year_id' => $schoolYearids[0],
            'identification_number' => '19200850'
        ]);

        Teacher::create([
            'user_id' => $teacher->id,
            'identification_number' => '19200750'
        ]);
    }
}
