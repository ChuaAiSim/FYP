<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',30)->unique();
            $table->string('password',100)->index();
            $table->string('name',10)->index();
            $table->timestamps();
        });

        DB::table('Admins')->insert(
            array(
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'name' => 'admin',
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
        Schema::dropIfExists('Admins');
    }
}
