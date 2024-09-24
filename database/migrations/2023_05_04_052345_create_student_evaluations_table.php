<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('partner_id');
            $table->integer('job_id');
            $table->integer('rating_1');
            $table->integer('rating_2');
            $table->integer('rating_3');
            $table->integer('rating_4');
            $table->integer('rating_5');
            $table->integer('rating_6');
            $table->integer('rating_7');
            $table->integer('rating_8');
            $table->integer('rating_9');
            $table->integer('rating_10');
            $table->integer('rating_11');
            $table->integer('rating_12');
            $table->integer('rating_13');
            $table->integer('rating_14');
            $table->integer('rating_15');
            $table->integer('rating_16');
            $table->integer('rating_17');
            $table->integer('rating_18');
            $table->integer('rating_19');
            $table->integer('rating_20');
            $table->integer('rating_21');
            $table->integer('rating_22');
            $table->integer('rating_23');
            $table->string('remarks');
            $table->string('date_eval');
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
        Schema::dropIfExists('student_evaluations');
    }
}
