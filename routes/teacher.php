<?php

use App\Http\Controllers\Api\StudentAttendanceController;
use App\Http\Controllers\Teacher\AssignmentController;
use App\Http\Controllers\Teacher\AttendanceController;
use App\Http\Controllers\Teacher\AttendanceRecapController;
use App\Http\Controllers\Teacher\MaterialController;
use App\Http\Controllers\Teacher\TeachingScheduleController;
use Illuminate\Support\Facades\Route;

Route::prefix('guru')->middleware('auth', 'permissions')->group(function () {
    Route::get('/dashboard', function () {
        return view('teachers.dashboard');
    })->name('teacher-dashboard.index');

    //* Route Teaching Schedules 
    Route::get('/jadwal-mengajar', [TeachingScheduleController::class, 'index'])->name('teacher-teaching-schedules.index');
    Route::get('/jadwal-mengajar/{scheduleOfSubject}/kehadiran', [AttendanceController::class, 'index'])->name('teacher-attendances.index');
    Route::put('/jadwal-mengajar/kehadiran/{studentId}', [StudentAttendanceController::class, 'changeStatus'])->name('teacher-attendances.update');

    //* Route Materials  
    Route::get('guru/jadwal-mengajar/{scheduleOfSubject}/ruang-materi/trashed', [MaterialController::class, 'trashed'])->name('teacher-materials.trashed');
    Route::post('guru/jadwal-mengajar/{scheduleOfSubject}/ruang-materi/{material}/restore', [MaterialController::class, 'restore'])->name('teacher-materials.restore');
    Route::post('guru/jadwal-mengajar/{scheduleOfSubject}/ruang-materi/{material}/force-delete', [MaterialController::class, 'forceDelete'])->name('teacher-materials.force-delete');
    Route::resource('jadwal-mengajar.ruang-materi', MaterialController::class)->except(['show'])->parameters([
        'jadwal-mengajar' => 'scheduleOfSubject',
        'ruang-materi' => 'material'
    ])->names([
        'index' => 'teacher-materials.index',
        'create' => 'teacher-materials.create',
        'store' => 'teacher-materials.store',
        'edit' => 'teacher-materials.edit',
        'update' => 'teacher-materials.update',
        'destroy' => 'teacher-materials.destroy',
    ]);

    //* Route Assignments  
    Route::get('guru/jadwal-mengajar/{scheduleOfSubject}/ruang-tugas/trashed', [AssignmentController::class, 'trashed'])->name('teacher-assignments.trashed');
    Route::post('guru/jadwal-mengajar/{scheduleOfSubject}/ruang-tugas/{assignment}/restore', [AssignmentController::class, 'restore'])->name('teacher-assignments.restore');
    Route::post('guru/jadwal-mengajar/{scheduleOfSubject}/ruang-tugas/{assignment}/force-delete', [AssignmentController::class, 'forceDelete'])->name('teacher-assignments.force-delete');
    Route::resource('jadwal-mengajar.ruang-tugas', AssignmentController::class)->parameters([
        'jadwal-mengajar' => 'scheduleOfSubject',
        'ruang-tugas' => 'assignment'
    ])->names([
        'index' => 'teacher-assignments.index',
        'create' => 'teacher-assignments.create',
        'store' => 'teacher-assignments.store',
        'show' => 'teacher-assignments.show',
        'edit' => 'teacher-assignments.edit',
        'update' => 'teacher-assignments.update',
        'destroy' => 'teacher-assignments.destroy',
    ]);

    // Route attendances recap
    Route::get('jadwal-mengajar/rekap-absensi', [AttendanceRecapController::class, 'index'])->name('teacher-attendances-recap.index');
});
