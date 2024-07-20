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
        Schema::create('extracurricular_members', function (Blueprint $table) {
            $table->string('extracurricular_schedule_id', 36);
            $table->foreign('extracurricular_schedule_id')->references('id')->on('extracurricular_schedules')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('student_id', 36);
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['extracurricular_schedule_id', 'student_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extracurricular_members');
    }
};