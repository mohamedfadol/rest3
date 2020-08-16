<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('OrderNumber')->nullable();
            $table->integer('Qty')->nullable();
            $table->float('price')->nullable();
            $table->string('note')->nullable();
            $table->integer('printed')->nullable();
            $table->string('date')->nullable();
            $table->string('delivaryDate')->nullable();
            $table->uuid('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->uuid('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->uuid('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');
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
