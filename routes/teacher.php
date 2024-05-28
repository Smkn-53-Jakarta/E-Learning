<?php
use Illuminate\Support\Facades\Route;

Route::prefix('guru')->middleware('auth', 'permissions')->group(function () {
    Route::get('/dashboard', function () {
        return view('teachers.dashboard');
    })->name('dashboard-teachers.index');

    Route::get('mengajar', function(){
        return view('teachers.teaching-schedules.index');
    })->name('teaching-schedules.index');
});