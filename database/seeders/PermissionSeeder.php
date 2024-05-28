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
                'name' => 'dashboard.index',
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
                'name' => 'statuses.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'statuses.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'statuses.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'statuses.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'statuses.restore',
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
                'name' => 'teachers.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teachers.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teachers.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teachers.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teachers.restore',
                'guard_name' => 'web'
            ],
            [
                'name' => 'students.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'students.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'students.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'students.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'students.restore',
                'guard_name' => 'web'
            ],
            [
                'name' => 'classrooms.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'classrooms.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'classrooms.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'classrooms.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'classrooms.restore',
                'guard_name' => 'web'
            ],
            [
                'name' => 'school-years.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'school-years.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'school-years.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'school-years.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'school-years.restore',
                'guard_name' => 'web'
            ],
            [
                'name' => 'extracurriculars.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'extracurriculars.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'extracurriculars.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'extracurriculars.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'extracurriculars.restore',
                'guard_name' => 'web'
            ],
            [
                'name' => 'schedule-of-subjects.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'schedule-of-subjects.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'schedule-of-subjects.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'schedule-of-subjects.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'schedule-of-subjects.restore',
                'guard_name' => 'web'
            ],
            [
                'name' => 'attendances-teachers.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'attendances-students.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'attendances-teachers-attendances.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'attendances-students-attendances.read',
                'guard_name' => 'web'
            ],
        ];

        Permission::insert($permissions);
    }
}