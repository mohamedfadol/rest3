<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoidOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('void_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('orderNumber')->nullable();
            $table->string('date')->nullable('null');
            $table->float('price')->nullable('null');
            $table->integer('Qty')->nullable('null');
            $table->string('note')->nullable('null');

            // $table->uuid('order_id');
            // $table->foreign('order_id')->references('id')->on('orders');

            $table->uuid('product_id');
            $table->foreign('product_id')->references('id')->on('products');


            $table->uuid('addByUserId');
            $table->foreign('addByUserId')->references('id')->on('users');
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
        Schema::dropIfExists('void_orders');
    }
}
