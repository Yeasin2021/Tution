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
            $table->string('student_name')->nullable();
            $table->string('student_class')->nullable();
            $table->string('group')->nullable();
            $table->string('institute')->nullable();
            $table->string('phone')->nullable();
            $table->integer('tution_fee')->nullable();
            $table->integer('tution_day')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->integer('student_id')->nullable();
            $table->string('email')->nullable();
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
