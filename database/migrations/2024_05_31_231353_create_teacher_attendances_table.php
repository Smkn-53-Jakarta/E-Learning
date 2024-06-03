<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teacher_attendances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('schedule_of_subject_id');
            $table->foreign('schedule_of_subject_id')->references('id')->on('schedule_of_subjects')->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime('attendance_time');
            $table->enum('status', ['Hadir', 'Tidak Hadir']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_attendances');
    }
};
