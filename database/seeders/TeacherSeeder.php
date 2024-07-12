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
        $statusActive = Status::where('name', 'Aktif')->first();

        $teacher1 = User::create([
            'status_id' => $statusActive->id,
            'name' => 'Herlambang Brawijaya',
            'email' => 'herlambang@gmail.com',
            'password' => bcrypt('herlambang')
        ]);

        $teacher2 = User::create([
            'status_id' => $statusActive->id,
            'name' => 'Sriyadi',
            'email' => 'sriyadi@gmail.com',
            'password' => bcrypt('sriyadi')
        ]);

        $teacher3 = User::create([
            'status_id' => $statusActive->id,
            'name' => 'Seziaji',
            'email' => 'aji@gmail.com',
            'password' => bcrypt('aji')
        ]);

        Teacher::create([
            'user_id' => $teacher1->id,
            'identification_number' => '197506151997022014'
        ]);

        Teacher::create([
            'user_id' => $teacher2->id,
            'identification_number' => '197506151997022015'
        ]);

        Teacher::create([
            'user_id' => $teacher3->id,
            'identification_number' => '197506151997022016'
        ]);

        $teacher1->assignRole('Teacher');
        $teacher2->assignRole('Teacher');
        $teacher3->assignRole('Teacher');
        // $teachers = Teacher::factory()->count(5)->create();

        // $teachers->each(function ($teacher) {
        //     $teacher->user->assignRole('Teacher');
        // });
    }
}