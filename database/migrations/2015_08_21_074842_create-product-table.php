<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('vendor_id')->unsigned();
            $table->string('slug', 80)->unique();
            $table->bigInteger('type')->unsigned();
            $table->bigInteger('category')->unsigned();
            $table->string('title', 60);
            $table->text('description');
            $table->decimal('price', 8,2);
            $table->decimal('weight', 8,2);
            $table->enum('unit', ['mg', 'g', 'kg', 'lb', 'unit', 'ml', 'l', 'cm']);
            $table->string('image', 100)->nullable();
            $table->enum('status', ['visible', 'hidden']);
            $table->string('notes');

            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('type')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('category')->references('id')->on('product_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
