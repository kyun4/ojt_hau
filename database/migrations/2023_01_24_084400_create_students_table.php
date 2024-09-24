<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id');
            $table->string('student_token')->nullable();
            $table->integer('academic_year_id');
            $table->string('student_number');
            $table->string('image')->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('program');
            $table->string('year');
            $table->string('section');
            $table->string('parent_last_name')->nullable();
            $table->string('parent_first_name')->nullable();
            $table->string('parent_middle_name')->nullable();
            $table->text('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('status');
            $table->string('stat');
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
        Schema::dropIfExists('students');
    }
}
