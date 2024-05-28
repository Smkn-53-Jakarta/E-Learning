<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\ExtracurricularController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ScheduleOfSubjectController;
use App\Http\Controllers\Admin\SchoolYearController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth', 'permissions')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard.index');

    //* Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.index');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    //* Route Roles
    Route::resource('roles', RoleController::class)->except('show');

    //* Route Permissions
    Route::resource('permissions', PermissionController::class)->except('show');

    //* Route Statuses
    Route::get('/status/trashed', [StatusController::class, 'trashed'])->name('statuses.trashed');
    Route::post('/status/{status}/restore', [StatusController::class, 'restore'])->name('statuses.restore');
    Route::post('/status/{status}/force-delete', [StatusController::class, 'forceDelete'])->name('statuses.force-delete');
    Route::resource('status', StatusController::class)->except(['show'])->names([
        'index' => 'statuses.index',
        'create' => 'statuses.create',
        'store' => 'statuses.store',
        'edit' => 'statuses.edit',
        'update' => 'statuses.update',
        'destroy' => 'statuses.destroy',
    ]);

    //* Route Courses
    Route::get('/mata-pelajaran/trashed', [CourseController::class, 'trashed'])->name('courses.trashed');
    Route::post('/mata-pelajaran/{course}/restore', [CourseController::class, 'restore'])->name('courses.restore');
    Route::post('/mata-pelajaran/{course}/force-delete', [CourseController::class, 'forceDelete'])->name('courses.force-delete');
    Route::resource('mata-pelajaran', CourseController::class)->except(['show'])->parameters(['mata-pelajaran' => 'course'])->names([
        'index' => 'courses.index',
        'create' => 'courses.create',
        'store' => 'courses.store',
        'edit' => 'courses.edit',
        'update' => 'courses.update',
        'destroy' => 'courses.destroy',
    ]);

    //* Route Teachers
    Route::get('/guru/trashed', [TeacherController::class, 'trashed'])->name('teachers.trashed');
    Route::post('/guru/{teacher}/restore', [TeacherController::class, 'restore'])->name('teachers.restore');
    Route::post('/guru/{teacher}/force-delete', [TeacherController::class, 'forceDelete'])->name('teachers.force-delete');
    Route::resource('guru', TeacherController::class)->except(['show'])->parameters(['guru' => 'teacher'])->names([
        'index' => 'teachers.index',
        'create' => 'teachers.create',
        'store' => 'teachers.store',
        'edit' => 'teachers.edit',
        'update' => 'teachers.update',
        'destroy' => 'teachers.destroy',
    ]);

    //* Route Students
    Route::get('/murid/trashed', [StudentController::class, 'trashed'])->name('students.trashed');
    Route::post('/murid/{student}/restore', [StudentController::class, 'restore'])->name('students.restore');
    Route::post('/murid/{student}/force-delete', [StudentController::class, 'forceDelete'])->name('students.force-delete');
    Route::resource('murid', StudentController::class)->except(['show'])->parameters(['murid' => 'student'])->names([
        'index' => 'students.index',
        'create' => 'students.create',
        'store' => 'students.store',
        'edit' => 'students.edit',
        'update' => 'students.update',
        'destroy' => 'students.destroy',
    ]);

    //* Route Classrooms
    Route::get('/kelas/trashed', [ClassroomController::class, 'trashed'])->name('classrooms.trashed');
    Route::post('/kelas/{classroom}/restore', [ClassroomController::class, 'restore'])->name('classrooms.restore');
    Route::post('/kelas/{classroom}/force-delete', [ClassroomController::class, 'forceDelete'])->name('classrooms.force-delete');
    Route::resource('kelas', ClassroomController::class)->except(['show'])->parameters(['kelas' => 'classroom'])->names([
        'index' => 'classrooms.index',
        'create' => 'classrooms.create',
        'store' => 'classrooms.store',
        'edit' => 'classrooms.edit',
        'update' => 'classrooms.update',
        'destroy' => 'classrooms.destroy',
    ]);

    //* Route SchoolYears
    Route::get('/tahun-pelajaran/trashed', [SchoolYearController::class, 'trashed'])->name('school-years.trashed');
    Route::post('/tahun-pelajaran/{schoolYear}/restore', [SchoolYearController::class, 'restore'])->name('school-years.restore');
    Route::post('/tahun-pelajaran/{schoolYear}/force-delete', [SchoolYearController::class, 'forceDelete'])->name('school-years.force-delete');
    Route::resource('tahun-pelajaran', SchoolYearController::class)->except(['show'])->parameters(['tahun-pelajaran' => 'schoolYear'])->names([
        'index' => 'school-years.index',
        'create' => 'school-years.create',
        'store' => 'school-years.store',
        'edit' => 'school-years.edit',
        'update' => 'school-years.update',
        'destroy' => 'school-years.destroy',
    ]);

    //* Route Ekstracurriculars
    Route::get('/ekstrakurikuler/trashed', [ExtracurricularController::class, 'trashed'])->name('extracurriculars.trashed');
    Route::post('/ekstrakurikuler/{extracurricular}/restore', [ExtracurricularController::class, 'restore'])->name('extracurriculars.restore');
    Route::post('/ekstrakurikuler/{extracurricular}/force-delete', [ExtracurricularController::class, 'forceDelete'])->name('extracurriculars.force-delete');
    Route::resource('ekstrakurikuler', ExtracurricularController::class)->except(['show'])->parameters(['ekstrakurikuler' => 'extracurricular'])->names([
        'index' => 'extracurriculars.index',
        'create' => 'extracurriculars.create',
        'store' => 'extracurriculars.store',
        'edit' => 'extracurriculars.edit',
        'update' => 'extracurriculars.update',
        'destroy' => 'extracurriculars.destroy',
    ]);

    //* Route Schedule Of Subject
    Route::get('/jadwal-mata-pelajaran/trashed', [ScheduleOfSubjectController::class, 'trashed'])->name('schedule-of-subjects.trashed');
    Route::post('/jadwal-mata-pelajaran/{scheduleOfSubject}/restore', [ScheduleOfSubjectController::class, 'restore'])->name('schedule-of-subjects.restore');
    Route::post('/jadwal-mata-pelajaran/{scheduleOfSubject}/force-delete', [ScheduleOfSubjectController::class, 'forceDelete'])->name('schedule-of-subjects.force-delete');
    Route::resource('jadwal-mata-pelajaran', ScheduleOfSubjectController::class)->except(['show'])->parameters(['jadwal-mata-pelajaran' => 'scheduleOfSubject'])->names([
        'index' => 'schedule-of-subjects.index',
        'create' => 'schedule-of-subjects.create',
        'store' => 'schedule-of-subjects.store',
        'edit' => 'schedule-of-subjects.edit',
        'update' => 'schedule-of-subjects.update',
        'destroy' => 'schedule-of-subjects.destroy',
    ]);

    //* Route Attendances Teachers
    Route::get('rekap-absensi/guru', function () {
        return view('admin.attendances.teachers.index');
    })->name('attendances-teachers.index');

    //*Show Attendances Teachers
    Route::get('rekap-absensi/guru/{teacher_id}', function () {
        return view('admin.attendances.teachers.show');
    })->name('attendances-teachers.show');

    //*Attendances Teachers
    Route::get('rekap-absensi/guru/{teacher_id}/kehadiran', function () {
        return view('admin.attendances.teachers.attendances');
    })->name('attendances-teachers-attendances.index');

    //* Route Attendances Students
    Route::get('rekap-absensi/siswa', function () {
        return view('admin.attendances.students.index');
    })->name('attendances-students.index');
    //*Show Attendances Students

});