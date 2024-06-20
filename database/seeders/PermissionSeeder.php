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
                'name' => 'extracurricular-schedules.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'extracurricular-schedules.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'extracurricular-schedules.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'extracurricular-schedules.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'extracurricular-schedules.restore',
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
            //* Teacher permissions
            [
                'name' => 'teacher-dashboard.index',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-teaching-schedules.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-attendances.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-attendances.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-materials.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-materials.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-materials.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-materials.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-materials.restore',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-assignments.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-assignments.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-assignments.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-assignments.delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-assignments.restore',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-attendances-recap.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-teaching-recaps.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher-raports.read',
                'guard_name' => 'web'
            ],

            //* Student Permissions 
            [
                'name' => 'student-dashboard.index',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student-schedule-of-subjects.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student-materials.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student-assignments.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student-submissions.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student-submissions.create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student-submissions.update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student-raports.read',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student-extracurriculars-schedules.read',
                'guard_name' => 'web'
            ],
        ];

        Permission::insert($permissions);
    }
}
