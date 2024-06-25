<?php

use App\Http\Controllers\Coach\AssesmentController;
use App\Http\Controllers\Coach\ExtracurricularScheduleController;
use Illuminate\Support\Facades\Route;

Route::prefix('pelatih')->middleware('auth', 'permissions')->group(function () {
    Route::get('/dashboard', function () {
        return view('coach.dashboard');
    })->name('coach-dashboard.index');

    Route::get('/jadwal-ekstrakurikuler', [ExtracurricularScheduleController::class, 'index'])->name('coach-extracurricular-schedules.index');
    Route::get('/ruang-penilaian/ekstrakurikuler', [AssesmentController::class, 'index'])->name('coach-extracurricular-assesment.index');
    Route::get('/ruang-penilaian/ekstrakurikuler/{extracurricular}', [AssesmentController::class, 'show'])->name('coach-extracurricular-assesment.show');
    Route::post('/ruang-penilaian/ekstrakurikuler/{extracurricular}', [AssesmentController::class, 'store'])->name('coach-extracurricular-assesment.store');
});
