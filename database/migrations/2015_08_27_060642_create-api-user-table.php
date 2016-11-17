<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->enum('status', ['active', 'blocked'])->default('active');
            $table->string('device_id', 24);
            $table->string('api_key', 100);
            $table->string('api_password', 100);
            $table->string('last_login', 20);
            $table->enum('verified', ['yes', 'no'])->default('no');
            $table->timestamps();

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
        Schema::dropIfExists('api_users');
    }
}
