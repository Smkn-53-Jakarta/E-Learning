<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScheduleOfSubject>
 */
class ScheduleOfSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        $startTime = $this->faker->time('H:i:s', '22:00:00');
        $endTime = date('H:i:s', strtotime($startTime . ' +1 hour'));

        return [
            'classroom_id' => Classroom::pluck('id')->random(),
            'teacher_id' => Teacher::pluck('id')->random(),
            'course_id' => Course::pluck('id')->random(),
            'day' => $this->faker->randomElement($days),
            'start_time' => $startTime,
            'end_time' => $endTime,
        ];
    }
}
