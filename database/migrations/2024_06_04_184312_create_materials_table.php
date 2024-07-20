<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->string('materials_id', 36 )->primary();
            $table->string('schedule_of_subject_id', 36);
            $table->foreign('schedule_of_subject_id')->references('id')->on('schedule_of_subjects')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('material_title', 64);
            $table->longText('material_description');
            $table->string('material_file');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
