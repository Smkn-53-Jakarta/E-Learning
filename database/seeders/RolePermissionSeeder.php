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

        $teacherPermissions = Permission::where(function ($query) {
            $query->where('name', 'like', 'teacher-dashboard.%')
                ->orWhere('name', 'like', 'teacher-teaching-schedules.%')
                ->orWhere('name', 'like', 'teacher-attendances.%')
                ->orWhere('name', 'like', 'teacher-materials.%');
        })->pluck('id')->all();

        $allPermissions = Permission::pluck('id')->all();

        $adminPermissions = array_diff($allPermissions, $teacherPermissions);

        $admin->syncPermissions($adminPermissions);
        $teacher->syncPermissions($teacherPermissions);
    }
}
