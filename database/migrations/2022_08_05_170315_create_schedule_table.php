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
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classroom_id')->unsigned();
            $table->integer('lecturer_id')->unsigned();
            $table->integer('slot_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('subject_id')->on('classroom_subject');
            $table->foreign('classroom_id')->references('classroom_id')->on('classroom_subject');
            $table->foreign('lecturer_id')->references('lecturer_id')->on('classroom_subject');
            $table->foreign('slot_id')->references('id')->on('slot');
            $table->date('start_date');
            $table->date('end_date');
            $table->json('recurrence');
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
        Schema::dropIfExists('schedule');
    }
};
