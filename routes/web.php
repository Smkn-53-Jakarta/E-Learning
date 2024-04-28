<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dataguru', function () {
    return view('adminmaster.dataguru');
});

Route::middleware('auth', 'permissions')->group(function () {
    //* Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.index');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    //* Route Roles
    Route::resource('roles', RoleController::class)->except('show');
});

require __DIR__ . '/auth.php';
