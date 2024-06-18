<?php

use Illuminate\Support\Facades\Route;

Route::prefix('murid')->middleware('auth', 'permissions')->group(function () {
    Route::get('/dashboard', function () {
        return view('students.dashboard');
    })->name('student-dashboard.index');
});