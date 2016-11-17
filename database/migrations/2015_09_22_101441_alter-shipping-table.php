<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendors_shipping_config', function (Blueprint $table) {
            $table->dropColumn('min_distance');
            $table->dropColumn('max_distance');
            $table->dropColumn('charges');
            $table->dropColumn('free_shipping_upto');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');

        });

        Schema::table('vendors_shipping_config', function (Blueprint $table) {
            $table->mediumInteger('minimum_shipping_charges')->after('vendor_id');
            $table->mediumInteger('free_shipping_order')->after('minimum_shipping_charges');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
