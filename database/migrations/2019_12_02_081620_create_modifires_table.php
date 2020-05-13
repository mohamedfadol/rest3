<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modifires', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nameAr')->nullable('null');
            $table->string('nameEn')->nullable('null');
            $table->string('sku')->nullable();
            $table->float('cost')->defualt(0);
            $table->float('tax')->defualt(0);
            $table->float('price')->defualt(0);
            $table->enum('unit', ['Kg','Pices']);

            $table->uuid('addByUserId');
            $table->foreign('addByUserId')->references('id')->on('users');
            $table->timestamps();
        });

        DB::statement('ALTER Table modifires add code INTEGER NOT NULL  UNIQUE AUTO_INCREMENT;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modifires');
    }
}
