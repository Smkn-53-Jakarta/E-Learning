<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProfileController;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'permissions')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    //* Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.index');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    //* Route Roles
    Route::resource('roles', RoleController::class)->except('show');

    //* Route Permissions
    Route::resource('permissions', PermissionController::class)->except('show');

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

    //* Route Teacher
    Route::get('/guru/trashed', [TeacherController::class, 'trashed'])->name('teacher.trashed');
    Route::post('/guru/{teacher}/restore', [TeacherController::class, 'restore'])->name('teacher.restore');
    Route::post('/guru/{teacher}/force-delete', [TeacherController::class, 'forceDelete'])->name('teacher.force-delete');
    Route::resource('guru', TeacherController::class)->except(['show'])->parameters(['guru' => 'teacher'])->names([
        'index' => 'teacher.index',
        'create' => 'teacher.create',
        'store' => 'teacher.store',
        'edit' => 'teacher.edit',
        'update' => 'teacher.update',
        'destroy' => 'teacher.destroy',
    ]);

    
});

require __DIR__ . '/auth.php';
