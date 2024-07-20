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
        Schema::create('assignments', function (Blueprint $table) {
            $table->string('assignments_id', 36)->primary();
            $table->string('schedule_of_subject_id');
            $table->foreign('schedule_of_subject_id')->references('id')->on('schedule_of_subjects')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('assignments_title', 64);
            $table->longText('assignments_description');
            $table->unsignedInteger('meeting');
            $table->string('assignments_file');
            $table->dateTime('assignments_start_date');
            $table->dateTime('assignments_end_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
