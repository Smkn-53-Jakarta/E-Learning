<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProfileController;
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
    Route::resource('mata-pelajaran', CourseController::class)->parameters(['mata-pelajaran' => 'course'])->names([
        'index' => 'courses.index',
        'create' => 'courses.create',
        'store' => 'courses.store',
        'show' => 'courses.show',
        'edit' => 'courses.edit',
        'update' => 'courses.update',
        'destroy' => 'courses.destroy',
    ]);
});

require __DIR__ . '/auth.php';
