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
        Schema::create('admins', function (Blueprint $table) {
           
        
            $table->string('email');
           
            $table->integer('role');
            $table->string('password');
            $table->timestamps();
        });

        DB::table('admins')->insert(
            array(
                'email' => 'admin@gmail.com',
                'password' => '12345678'
            ),
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
