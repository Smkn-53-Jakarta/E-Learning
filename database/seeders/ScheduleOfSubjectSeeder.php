<?php

namespace Database\Seeders;

use App\Models\ScheduleOfSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleOfSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScheduleOfSubject::factory()->count(20)->create();
    }
}
