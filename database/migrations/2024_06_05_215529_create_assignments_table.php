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
            $table->uuid('id')->primary();
            $table->string('schedule_of_subject_id');
            $table->foreign('schedule_of_subject_id')->references('id')->on('schedule_of_subjects')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title', 64);
            $table->longText('description');
            $table->unsignedInteger('meeting');
            $table->string('file');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
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
