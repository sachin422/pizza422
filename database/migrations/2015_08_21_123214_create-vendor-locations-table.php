<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vendor_id')->unsigned();
            $table->bigInteger('location_id')->unsigned();
            $table->enum('exclude', ['yes', 'no'])->default('no'); // weather to exclude vendor from this location
            $table->timestamps();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_locations');
    }
}
