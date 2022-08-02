<?php

use App\Models\Major;
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
        Schema::create('majors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('majorTerm');
            $table->string('majorName');
            $table->timestamps();
        });

        DB::table('majors')->insert(
            array(
                'majorTerm' => 'SE',
                'majorName' => 'Computing'
            ),
            array(
                'majorTerm' => 'BA-BM',
                'majorName' => 'Business Management'
            ),
            array(
                'majorTerm' => 'GD',
                'majorName' => 'Graphic and Digital Design'
            )
        );
        DB::table('majors')->insert(
            array(
                'majorTerm' => 'BA-BM',
                'majorName' => 'Business Management'
            ),
        );
        DB::table('majors')->insert(
            array(
                'majorTerm' => 'GD',
                'majorName' => 'Graphic and Digital Design'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('majors');
    }
};
