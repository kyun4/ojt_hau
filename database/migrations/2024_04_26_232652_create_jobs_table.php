<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->string('position');
            $table->string('location');
            $table->text('job_descriptions')->nullable();
            $table->text('qualifications')->nullable();
            $table->string('salary_s')->nullable();
            $table->string('salary_e')->nullable();
            $table->text('remarks')->nullable();
            $table->string('level')->nullable();
            $table->integer('experience_length')->nullable();
            $table->integer('education_per')->nullable();
            $table->integer('skill_per')->nullable();
            $table->integer('work_exp_per')->nullable();
            $table->string('status');
            $table->string('stat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
