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
        Schema::create('slot', function (Blueprint $table) {
            $table->increments('id');
            $table->string('start_time');
            $table->string('end_time');
        });

        DB::table('slot')->insert(
            array(
                'start_time' => '07:15',
                'end_time' => '09:00'
            ),
        );
        DB::table('slot')->insert(
            array(
                'start_time' => '09:10',
                'end_time' => '10:25'
            ),
        );
        DB::table('slot')->insert(
            array(
                'start_time' => '10:45',
                'end_time' => '12:15'
            ),
        );
        DB::table('slot')->insert(
            array(
                'start_time' => '12:45',
                'end_time' => '14:15'
            ),
        );
        DB::table('slot')->insert(
            array(
                'start_time' => '14:35',
                'end_time' => '16:05'
            ),
        );
        DB::table('slot')->insert(
            array(
                'start_time' => '16:15',
                'end_time' => '17:45'
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
        Schema::dropIfExists('slot');
    }
};
