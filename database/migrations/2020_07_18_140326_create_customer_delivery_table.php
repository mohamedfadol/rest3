<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_delivery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number')->nullable();
            $table->uuid('branch_id')->nullable();
            $table->uuid('customer_id')->nullable();
            $table->uuid('delivery_id')->nullable();
            $table->uuid('order_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists('customer_delivery');
    }
}
