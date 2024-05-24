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
        $statusIds = Status::pluck('id')->toArray();

        $admin = User::create([
            'status_id' => $statusIds[0],
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        $admin->assignRole('Admin');
    }
}
