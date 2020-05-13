<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeEventsTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_events', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nameAr')->nullable('null');
            $table->string('nameAE')->nullable('null');
            $table->float('amount')->nullable('null');
            $table->string('dateFrom')->nullable('null');
            $table->string('dateTo')->nullable('null');

            $table->uuid('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches');

            $table->uuid('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

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
        Schema::dropIfExists('time_events');
    }
}
