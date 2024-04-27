<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'profile.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'profile.update',
                'guard_name' => 'web'
            ],
        ];

        Permission::insert($permissions);
    }
}