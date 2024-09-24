<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_monitorings', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('job_id');
            $table->integer('partner_id');
            $table->text('date_log')->nullable();
            $table->text('time_in')->nullable();
            $table->text('time_out')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('student_monitorings');
    }
}
