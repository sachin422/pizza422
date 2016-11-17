<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendors', function ($table) {
            $table->dropColumn('commission');
            $table->dropColumn('shipping_radius');
        });

        Schema::table('vendors', function ($table) {
            $table->string('slogan', 250)->nullable()->after('slug');
            $table->integer('max_shipping_distance')->after('rating');
            $table->smallInteger('minimum_order')->after('max_shipping_distance'); // mini order to place
            $table->decimal('tax', 4,2)->after('minimum_order');
        });

        Schema::table('vendors_shipping_config', function (Blueprint $table) {
            $table->dropColumn('minimum_order');
            $table->dropColumn('minimum_shipping_charges');
            $table->dropColumn('free_shipping_range');
            $table->dropColumn('free_shipping_max_area');
            $table->dropColumn('shipping_condition');
            $table->dropColumn('tax');

        });

        Schema::table('vendors_shipping_config', function (Blueprint $table) {
            $table->mediumInteger('min_distance')->after('vendor_id');
            $table->mediumInteger('max_distance')->after('min_distance');
            $table->mediumInteger('charges')->after('max_distance');
            $table->mediumInteger('free_shipping_upto')->after('charges');
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
