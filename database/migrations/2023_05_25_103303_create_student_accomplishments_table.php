<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAccomplishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_accomplishments', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('date_start');
            $table->string('date_end');
            $table->string('accomplishment');
            $table->string('hours_rendered')->nullable();
            $table->string('status')->nullable();
            $table->integer('grade')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('student_accomplishments');
    }
}