<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_requirements', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('job_id');
            $table->string('initial_req_1')->nullable();
            $table->string('initial_req_2')->nullable();
            $table->string('initial_req_3')->nullable();
            $table->string('initial_req_4')->nullable();
            $table->string('other_file_1')->nullable();
            $table->string('other_file_2')->nullable();
            $table->string('other_file_3')->nullable();
            // $table->string('completion_req_1')->nullable();
            // $table->string('completion_req_2')->nullable();
            // $table->string('completion_req_3')->nullable();
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
        Schema::dropIfExists('student_requirements');
    }
}
