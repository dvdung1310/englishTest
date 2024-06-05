<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_student', function (Blueprint $table) {
            $table->increments('student_id');
            $table->string('student_firstname');
            $table->string('student_lastname');
            $table->string('student_email');
            $table->string('student_phone',11);
            $table->string('student_username');
            $table->string('student_password');
            $table->string('student_type',2);
            $table->boolean('student_status');
            $table->integer('teacher_id');
            $table->integer('sale_id');
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
        Schema::dropIfExists('tbl_student');
    }
}
