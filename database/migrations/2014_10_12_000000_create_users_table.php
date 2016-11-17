<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 30);
            $table->string('key_name', 30);
        });


        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('status', ['active', 'blocked', 'inactive'])->default('inactive');
            $table->string('email')->index();
            $table->string('phone', 10)->unique();
            $table->string('password', 100);
          
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('user_roles', function (Blueprint $table) {

            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('role_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('roles');
       

    }
}
