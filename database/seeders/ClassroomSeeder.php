<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacherIds = Teacher::pluck('id')->toArray();

        $classrooms = [
            [
                'id' => Str::uuid(),
                'homeroom_teacher' => $teacherIds[0],
                'name' => 'X-TKJ',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'homeroom_teacher' => $teacherIds[1],
                'name' => 'XI-TKJ',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'homeroom_teacher' => $teacherIds[2],
                'name' => 'XII-TKJ',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        Classroom::insert($classrooms);
    }
}
