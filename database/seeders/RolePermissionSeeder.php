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
        $adminPermissions = Permission::pluck('id')->all();
        $admin->syncPermissions($adminPermissions);

        $teacher = Role::where('name', 'Teacher')->first();
        $teacherPermissions = Permission::where(function ($query) {
            $query->where('name', 'like', 'dashboard.%');
        })->pluck('id')->all();
        $teacher->syncPermissions($teacherPermissions);
    }
}
