<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'id' => Str::uuid(),
                'name' => 'Matematika',
                'kkm' => 75,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Bahasa Indonesia',
                'kkm' => 75,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Bahasa Inggris',
                'kkm' => 75,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        Course::insert($courses);
    }
}
