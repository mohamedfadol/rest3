<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nameAr')->nullable('null');
            $table->string('nameEn')->nullable('null');
            $table->string('note')->nullable('null');
            $table->float('price')->nullable('null');
            $table->enum('unit', ['Kg','Pices']);
            $table->string('sku')->nullable();

            $table->uuid('addByUserId');
            $table->foreign('addByUserId')->references('id')->on('users');
            $table->timestamps();
        });

        DB::statement('ALTER Table ingredients add code INTEGER NOT NULL  UNIQUE  AUTO_INCREMENT;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
