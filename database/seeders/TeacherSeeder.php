<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusIds = Status::pluck('id')->toArray();

        $teacher1 = User::create([
            'status_id' => $statusIds[0],
            'name' => 'Teacher1',
            'email' => 'teacher1@gmail.com',
            'password' => bcrypt('teacher')
        ]);

        $teacher2 = User::create([
            'status_id' => $statusIds[0],
            'name' => 'Teacher2',
            'email' => 'teacher2@gmail.com',
            'password' => bcrypt('teacher')
        ]);

        $teacher3 = User::create([
            'status_id' => $statusIds[0],
            'name' => 'Teacher3',
            'email' => 'teacher3@gmail.com',
            'password' => bcrypt('teacher')
        ]);

        $teacher1->assignRole('Teacher');
        $teacher2->assignRole('Teacher');
        $teacher3->assignRole('Teacher');

        Teacher::create([
            'user_id' => $teacher1->id,
            'identification_number' => '19200750'
        ]);

        Teacher::create([
            'user_id' => $teacher2->id,
            'identification_number' => '19200760'
        ]);

        Teacher::create([
            'user_id' => $teacher3->id,
            'identification_number' => '19200770'
        ]);
    }
}
