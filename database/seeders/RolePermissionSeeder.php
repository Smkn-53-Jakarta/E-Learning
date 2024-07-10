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
        $coach = Role::where('name', 'Coach')->first();

        $teacherPermissions = Permission::where(function ($query) {
            $query->where('name', 'like', 'teacher-dashboard.%')
                ->orWhere('name', 'like', 'teacher-teaching-schedules.%')
                ->orWhere('name', 'like', 'teacher-attendances.%')
                ->orWhere('name', 'like', 'teacher-materials.%')
                ->orWhere('name', 'like', 'teacher-assignments.%')
                ->orWhere('name', 'like', 'teacher-submissions.%')
                ->orWhere('name', 'like', 'teacher-attendances-recap.%')
                ->orWhere('name', 'like', 'teacher-teaching-recaps.%')
                ->orWhere('name', 'like', 'teacher-raports.%')
                ->orWhere('name', 'like', 'teacher-homeroom-raports.%')
                ->orWhere('name', 'like', 'teacher-homeroom-raport-notes.%');
        })->pluck('id')->all();

        $studentPermissions = Permission::where(function ($query) {
            $query->where('name', 'like', 'student-dashboard.%')
                ->orWhere('name', 'like', 'student-schedule-of-subjects.%')
                ->orWhere('name', 'like', 'student-materials.%')
                ->orWhere('name', 'like', 'student-assignments.%')
                ->orWhere('name', 'like', 'student-submissions.%')
                ->orWhere('name', 'like', 'student-raports.%')
                ->orWhere('name', 'like', 'student-extracurriculars-schedules.%')
                ->orWhere('name', 'like', 'student-attendances-recaps.%');
        })->pluck('id')->all();

        $coachPermissions = Permission::where(function ($query) {
            $query->where('name', 'like', 'coach-dashboard.%')
                ->orWhere('name', 'like', 'coach-extracurricular-schedules.%')
                ->orWhere('name', 'like', 'coach-extracurricular-assesment.%');
        })->pluck('id')->all();

        $allPermissions = Permission::pluck('id')->all();

        $adminPermissions = array_diff($allPermissions, $teacherPermissions, $studentPermissions, $coachPermissions);

        $admin->syncPermissions($adminPermissions);
        $teacher->syncPermissions($teacherPermissions);
        $student->syncPermissions($studentPermissions);
        $coach->syncPermissions($coachPermissions);
    }
}
