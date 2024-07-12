<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\SchoolYear;
use App\Models\Status;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusActive = Status::where('name', 'Aktif')->first();
        $classroomIds = Classroom::pluck('id')->toArray();
        $schoolYearIds = SchoolYear::pluck('id')->toArray();

        $student1 = User::create([
            'status_id' => $statusActive->id,
            'name' => 'Rahmat Fauzi Widianto',
            'email' => 'rahmat@gmail.com',
            'password' => bcrypt('rahmat')
        ]);

        $student2 = User::create([
            'status_id' => $statusActive->id,
            'name' => 'Muhammad Ridwan',
            'email' => 'ridwan@gmail.com',
            'password' => bcrypt('ridwan')
        ]);

        $student3 = User::create([
            'status_id' => $statusActive->id,
            'name' => 'Atikah Rahmawati',
            'email' => 'atikah@gmail.com',
            'password' => bcrypt('atikah')
        ]);

        Student::create([
            'user_id' => $student1->id,
            'classroom_id' => $classroomIds[0],
            'school_year_id' => $schoolYearIds[0],
            'identification_number' => '0035762958'
        ]);

        Student::create([
            'user_id' => $student2->id,
            'classroom_id' => $classroomIds[0],
            'school_year_id' => $schoolYearIds[0],
            'identification_number' => '0035762959'
        ]);

        Student::create([
            'user_id' => $student3->id,
            'classroom_id' => $classroomIds[1],
            'school_year_id' => $schoolYearIds[0],
            'identification_number' => '0035762960'
        ]);

        $student1->assignRole('Student');
        $student2->assignRole('Student');
        $student3->assignRole('Student');

        // $students = Student::factory()->count(20)->create();

        // $students->each(function ($student) {
        //     $student->user->assignRole('Student');
        // });
    }
}
