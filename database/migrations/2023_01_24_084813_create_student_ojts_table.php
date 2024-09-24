<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentOjtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_ojts', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('partner_id');
            $table->integer('job_id');
            $table->integer('academic_year_id');
            $table->text('evaluation')->nullable();
            $table->text('reflection')->nullable();
            $table->text('certificate')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('student_ojts');
    }
}
