<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('number')->unique();
            $table->foreignId('client_id')->constrained()->references('id')->on('users');
            $table->enum('status',['nueva', 'aceptada', 'terminada', 'entregada', 'pagada'])->default('nueva');
            $table->float('anticipo')->nullable();
            $table->float('total');
            $table->json('content')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('created_by')->nullable()->constrained()->references('id')->on('users');
            $table->foreignId('updated_by')->nullable()->constrained()->references('id')->on('users');
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
        Schema::dropIfExists('orders');
    }
}
