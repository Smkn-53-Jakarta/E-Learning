<?php

use App\Http\Controllers\Teacher\AttendanceController;
use App\Http\Controllers\Teacher\TeachingScheduleController;
use Illuminate\Support\Facades\Route;

Route::prefix('guru')->middleware('auth', 'permissions')->group(function () {
    Route::get('/dashboard', function () {
        return view('teachers.dashboard');
    })->name('teacher-dashboard.index');

    Route::get('/jadwal-mengajar', [TeachingScheduleController::class, 'index'])->name('teacher-teaching-schedules.index');

    Route::get('/jadwal-mengajar/{scheduleOfSubject}/kehadiran', [AttendanceController::class, 'index'])->name('teacher-attendances.index');

    Route::get('jadwal-mengajar/ruang-materi', function () {
        return view('teachers.materials.index');
    })->name('teacher-materials.index');

    Route::get('jadwal-mengajar/ruang-materi/tambah-materi', function(){
        return view('teachers.materials.create');
    })->name('teacher-materials.create');
});