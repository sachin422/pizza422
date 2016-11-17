<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('vendor_id')->unsigned();
            $table->decimal('discount', 10,2);
            $table->decimal('paid_amount', 10,2);
            $table->enum('order_scheduled', ['yes', 'no']);
            $table->timestamp('schedule_from');
            $table->timestamp('schedule_to');
            $table->text('billing_address');
            $table->text('shipping_address');
            $table->string('notes');
            $table->enum('paid', ['yes', 'no'])->default('no');
            $table->enum('status', ['pending', 'processing', 'dispatched', 'completed', 'cancelled']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
