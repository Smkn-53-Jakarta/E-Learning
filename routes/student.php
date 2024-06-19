<?php

use App\Http\Controllers\Student\AssignmentController;
use App\Http\Controllers\Student\MaterialController;
use App\Http\Controllers\Student\ScheduleOfSubjectController;
use App\Http\Controllers\Student\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::prefix('murid')->middleware('auth', 'permissions')->group(function () {
    Route::get('/dashboard', function () {
        return view('students.dashboard');
    })->name('student-dashboard.index');

    //* Jadwal ScheduleOfSubjects
    Route::get('jadwal-mata-pelajaran', [ScheduleOfSubjectController::class, 'index'])->name('student-schedule-of-subjects.index');

    //* Ruang Materials
    Route::get('jadwal-mata-pelajaran/{scheduleOfSubject}/ruang-materi', [MaterialController::class, 'index'])->name('student-materials.index');

    //* Ruang Assignments
    Route::get('jadwal-mata-pelajaran/{scheduleOfSubject}/ruang-tugas', [AssignmentController::class, 'index'])->name('student-assignments.index');
    Route::get('jadwal-mata-pelajaran/{scheduleOfSubject}/ruang-tugas/{assignment}/download', [AssignmentController::class, 'download'])->name('student-assignments.show');

    //* Route Submissions
    Route::get('jadwal-mata-pelajaran/{scheduleOfSubject}/ruang-penilaian', [SubmissionController::class, 'index'])->name('student-submissions.index');
    Route::get('jadwal-mata-pelajaran/{scheduleOfSubject}/ruang-tugas/{assignment}/ruang-penilaian/create', [SubmissionController::class, 'create'])->name('student-submissions.create');
    Route::post('jadwal-mata-pelajaran/{scheduleOfSubject}/ruang-tugas/{assignment}/ruang-penilaian', [SubmissionController::class, 'store'])->name('student-submissions.store');
});
