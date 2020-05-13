<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('class_products', function (Blueprint $table) {
            
            $table->uuid('id'); 
            $table->primary(['id']);
            $table->string('nameAr')->nullable();
            $table->string('nameEn')->nullable();
            $table->string('note')->nullable();

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
        Schema::dropIfExists('class_products');
    }
}
