<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->uuid('id')->primary();
            $table->integer('OrderNumber')->nullable('null');
            $table->integer('Qty')->nullable('null');
            $table->float('price')->nullable('null');
            $table->string('note')->nullable('null');
            $table->integer('printed')->nullable('null');
            $table->string('date')->nullable('null');
            $table->string('delivaryDate')->nullable('null');

            $table->uuid('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

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
        Schema::dropIfExists('order_details');
    }
}
