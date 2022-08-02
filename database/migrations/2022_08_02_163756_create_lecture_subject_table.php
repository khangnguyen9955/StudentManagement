<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer_subject', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->unsigned();
            $table->integer('lecturer_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->timestamps();
        });
    }
    // $table->increments('id');
    // $table->integer('class_id')->unsigned();
    // $table->integer('subject_id')->unsigned();
    // $table->foreign('class_id')->references('id')->on('classrooms');
    // $table->foreign('subject_id')->references('id')->on('subjects');
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturer_subject');
    }
};
