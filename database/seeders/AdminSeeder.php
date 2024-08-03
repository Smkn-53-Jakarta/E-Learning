<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusActive = Status::where('name', 'Aktif')->first();

        $admin = User::create([
            'status_id' => $statusActive->id,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('smkn53jakarta')
        ]);

        $admin->assignRole('Admin');
    }
}
