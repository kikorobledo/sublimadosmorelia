<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('quantity', 8,2);
            $table->unsignedDecimal('price', 8,2);
            $table->unsignedDecimal('total', 8,2);
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->foreignId('order_id')->constrained()->references('id')->on('orders')->onDelete('cascade');
            $table->foreignId('design_id')->constrained()->references('id')->on('designs');
            $table->foreignId('product_id')->constrained()->references('id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
