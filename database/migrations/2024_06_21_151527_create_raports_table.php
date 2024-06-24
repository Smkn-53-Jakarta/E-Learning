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
        Schema::create('raports', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('student_id');
            $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('average_value');
            $table->unsignedBigInteger('uts');
            $table->unsignedBigInteger('uas');
            $table->longText('information');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raports');
    }
};
