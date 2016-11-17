<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorShippingConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors_shipping_config', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vendor_id')->unsigned();
            $table->smallInteger('minimum_order'); // mini order to place
            // default options
            $table->smallInteger('minimum_shipping_charges'); // mini shipping charges
            $table->smallInteger('free_shipping_range'); // order above shipping is free
            // location based
            $table->tinyInteger('free_shipping_max_area'); // 5 km
              // min and max area 2 in case of paid shipping
            $table->enum('shipping_condition', ['default', 'location_based', 'price_based'])->default('default');
            $table->decimal('tax', 4,2);
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
        Schema::dropIfExists('vendor_shipping_config');
        Schema::dropIfExists('vendors_shipping_config');
    }
}
