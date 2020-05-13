<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_ingredient', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->float('quantity')->nullable('null');
            
            $table->uuid('product_id')->nullable('null');
            $table->uuid('ingredient_id')->nullable('null');

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');

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
        Schema::dropIfExists('product_ingredient');
    }
}
