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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lecturerCode');
            $table->string('fullName');
            $table->string('password');
            $table->string('email');
            $table->integer('role');
            $table->string('phone');
            $table->integer('major_id')->unsigned();
            $table->foreign('major_id')->references('id')->on('majors');           
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
        Schema::dropIfExists('lecturers');
    }
};
