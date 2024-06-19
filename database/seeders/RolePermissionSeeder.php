<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('name', 'Admin')->first();
        $teacher = Role::where('name', 'Teacher')->first();
        $student = Role::where('name', 'Student')->first();

        $teacherPermissions = Permission::where(function ($query) {
            $query->where('name', 'like', 'teacher-dashboard.%')
                ->orWhere('name', 'like', 'teacher-teaching-schedules.%')
                ->orWhere('name', 'like', 'teacher-attendances.%')
                ->orWhere('name', 'like', 'teacher-materials.%')
                ->orWhere('name', 'like', 'teacher-assignments.%')
                ->orWhere('name', 'like', 'teacher-attendances-recap.%')
                ->orWhere('name', 'like', 'teacher-teaching-recaps.%')
                ->orWhere('name', 'like', 'teacher-raports.%');
        })->pluck('id')->all();

        $studentPermissions = Permission::where(function ($query) {
            $query->where('name', 'like', 'student-dashboard.%')
                ->orWhere('name', 'like', 'student-schedule-of-subjects.%')
                ->orWhere('name', 'like', 'student-materials.%')
                ->orWhere('name', 'like', 'student-assignments.%')
                ->orWhere('name', 'like', 'student-submissions.%');
        })->pluck('id')->all();

        $allPermissions = Permission::pluck('id')->all();

        $adminPermissions = array_diff($allPermissions, $teacherPermissions, $studentPermissions);

        $admin->syncPermissions($adminPermissions);
        $teacher->syncPermissions($teacherPermissions);
        $student->syncPermissions($studentPermissions);
    }
}
