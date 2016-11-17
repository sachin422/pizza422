<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('address', 100);
            $table->string('city', 30);
            $table->string('state', 30);
            $table->string('pincode', 8)->nullable();
            $table->string('lat', 30);
            $table->string('lng', 30);
            $table->string('type', 10);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('vendor_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vendor_id')->unsigned();
            $table->string('address', 100);
            $table->string('city', 30);
            $table->string('state', 30);
            $table->string('pincode', 8)->nullable();
            $table->string('lat', 30);
            $table->string('lng', 30);
            $table->string('type', 10);
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_addresses');
        Schema::dropIfExists('vendor_addresses');
    }
}
