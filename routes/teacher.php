<?php

use App\Http\Controllers\Teacher\TeachingScheduleController;
use Illuminate\Support\Facades\Route;

Route::prefix('guru')->middleware('auth', 'permissions')->group(function () {
    Route::get('/dashboard', function () {
        return view('teachers.dashboard');
    })->name('dashboard-teachers.index');

    Route::get('/jadwal-mengajar', [TeachingScheduleController::class, 'index'])->name('teaching-schedules.index');
});
