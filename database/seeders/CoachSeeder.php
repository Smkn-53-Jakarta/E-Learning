<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusActive = Status::where('name', 'Aktif')->first();

        $coach = User::create([
            'status_id' => $statusActive->id,
            'name' => 'Coach',
            'email' => 'coach@gmail.com',
            'password' => bcrypt('smkn53jakarta')
        ]);

        $coach->assignRole('Coach');
    }
}
