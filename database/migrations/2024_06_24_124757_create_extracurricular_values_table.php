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
        Schema::create('extracurricular_values', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('extracurricular_id');
            $table->foreign('extracurricular_id')->references('id')->on('extracurriculars')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('student_id');
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extracurricular_values');
    }
};
