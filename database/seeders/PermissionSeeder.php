<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'dashboard',
                'guard_name' => 'web'
            ],
            [
                'name' => 'profile.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'profile.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'roles.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'roles.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'roles.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'roles.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'permissions.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'permissions.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'permissions.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'permissions.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'courses.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'courses.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'courses.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'courses.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'courses.restore',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher.restore',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student.restore',
                'guard_name' => 'web'
            ],
        ];

        Permission::insert($permissions);
    }
}
