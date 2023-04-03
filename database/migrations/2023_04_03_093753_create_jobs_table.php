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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_category');
            $table->string('job_position');
            $table->string('job_level')->nullable();
            $table->integer('vacancy_no');
            $table->string('employment_type');
            $table->string('job_location');
            $table->integer('offered_salary');
            $table->string('deadline');

            $table->string('education_level');
            $table->string('experience')->nullable();
            $table->string('skill');
            $table->string('job_description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
