<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableModifierOptionProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modifierOption_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->float('quantity')->nullable('null');
            $table->uuid('product_id')->nullable('null');
            $table->uuid('modifire_id')->nullable('null');

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('modifire_id')->references('id')->on('modifires');
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
        Schema::dropIfExists('modifierOption_product');
    }
}
