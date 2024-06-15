<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Student',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Teacher',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Coach',
                'guard_name' => 'web'
            ]
        ];

        Role::insert($roles);
    }
}
