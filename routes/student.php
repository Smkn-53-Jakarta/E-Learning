<?php

use App\Http\Controllers\Student\ScheduleOfSubjectController;
use Illuminate\Support\Facades\Route;

Route::prefix('murid')->middleware('auth', 'permissions')->group(function () {
    Route::get('/dashboard', function () {
        return view('students.dashboard');
    })->name('student-dashboard.index');

    Route::get('jadwal-mata-pelajaran', [ScheduleOfSubjectController::class, 'index'])->name('student-schedule-of-subjects.index');
});
    // Route::get('jadwal-mata-pelajaran', function(){
    //     return view('students.schedule-of-subjects');
    // })->name('schedule-ofsubjects.index');