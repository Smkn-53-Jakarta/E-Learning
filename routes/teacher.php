<?php

use App\Http\Controllers\Teacher\AssignmentController;
use App\Http\Controllers\Teacher\AttendanceController;
use App\Http\Controllers\Teacher\MaterialController;
use App\Http\Controllers\Teacher\TeachingScheduleController;
use Illuminate\Support\Facades\Route;

Route::prefix('guru')->middleware('auth', 'permissions')->group(function () {
    Route::get('/dashboard', function () {
        return view('teachers.dashboard');
    })->name('teacher-dashboard.index');
    
    Route::get('/jadwal-mengajar', [TeachingScheduleController::class, 'index'])->name('teacher-teaching-schedules.index');

    Route::get('/jadwal-mengajar/{scheduleOfSubject}/kehadiran', [AttendanceController::class, 'index'])->name('teacher-attendances.index');
    

    Route::get('jadwal-mengajar/ruang-materi/trashed', [MaterialController::class, 'trashed'])
        ->name('teacher-materials.trashed');
    Route::resource('jadwal-mengajar/ruang-materi', MaterialController::class)
        ->only(['index', 'create', 'edit'])
        ->parameters(['ruang-materi' => 'material'])
        ->names([
            'index' => 'teacher-materials.index',
            'create' => 'teacher-materials.create',
            'edit' => 'teacher-materials.edit',
        ]);
    
    Route::get('jadwal-mengajar/ruang-tugas/trashed', [AssignmentController::class, 'trashed'])
        ->name('teacher-assignments.trashed');
    Route::resource('jadwal-mengajar/ruang-tugas', AssignmentController::class)
        ->except(['show','destroy','update','store'])
        ->parameters(['ruang-tugas' => 'assignment'])
        ->names([
            'index' => 'teacher-assignments.index',
            'create' => 'teacher-assignments.create',
            'edit' => 'teacher-assignments.edit',
        ]);

});