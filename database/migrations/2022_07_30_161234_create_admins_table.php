<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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

                'role' => '1',

                'password' => Hash::make('12345678')
            ),
        );
        $user = new User();
        $user->email = 'admin@gmail.com';
        $user->role = 1;
        $user->password = Hash::make('12345678');
        $user->save();
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
