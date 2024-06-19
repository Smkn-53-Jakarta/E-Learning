<?php

use App\Http\Controllers\Student\MaterialController;
use App\Http\Controllers\Student\RaportController;
use App\Http\Controllers\Student\ScheduleOfSubjectController;
use Illuminate\Support\Facades\Route;

Route::prefix('murid')->middleware('auth', 'permissions')->group(function () {
    Route::get('/dashboard', function () {
        return view('students.dashboard');
    })->name('student-dashboard.index');

    //* Jadwal Mata-Pelajaran
    Route::get('jadwal-mata-pelajaran', [ScheduleOfSubjectController::class, 'index'])->name('student-schedule-of-subjects.index');

    //* Ruang Materi
    Route::get('jadwal-mata-pelajaran/ruang-materi', [MaterialController::class, 'index' ])->name('student-materials.index');

    //* E-Raport
    Route::get('e-raport', [RaportController::class, 'index'])->name('student-raports.index');
});

Route::get('murid/e-raport/pdf', function () {
    return view('students.e-raports.generate');
});