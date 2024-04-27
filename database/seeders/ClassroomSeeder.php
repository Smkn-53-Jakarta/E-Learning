<?php

namespace Database\Seeders;

use App\Models\Classroom;
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
        $classrooms = [
            [
                'id' => Str::uuid(),
                'name' => 'X-TKJ'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'XI-TKJ'
            ],
            [
                'id' => Str::uuid(),
                'name' => 'XII-TKJ'
            ],
        ];

        Classroom::insert($classrooms);
    }
}