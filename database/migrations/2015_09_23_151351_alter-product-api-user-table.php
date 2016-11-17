<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductApiUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('api_users', function (Blueprint $table) {
            $table->string('device_id', 50)->change();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_vendor_id_foreign');
            $table->dropColumn('vendor_id');
            $table->string('sku', 40)->unique()->after('id');
            $table->enum('inventory_tracking', ['yes', 'no'])->after('image');
        });

        Schema::create('vendor_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vendor_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->decimal('stock', 10,2);
            $table->enum('inventory_tracking', ['yes', 'no']);
            $table->decimal('price', 8,2);
            $table->decimal('compare_price', 8,2);
            $table->string('notes');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        //
    }
}
