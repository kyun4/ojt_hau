<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_employments', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('work_exp_company');
            $table->string('work_exp_address');
            $table->string('work_exp_position');
            $table->string('work_exp_s_year');
            $table->string('work_exp_e_year');            
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
        Schema::dropIfExists('student_employments');
    }
}
