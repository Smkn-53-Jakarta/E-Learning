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
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_id', 36)->primary();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('classroom_id', 36);
            $table->foreign('classroom_id')->references('id')->on('classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('school_year_id', 36);
            $table->foreign('school_year_id')->references('id')->on('school_years')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('identification_number', 10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
