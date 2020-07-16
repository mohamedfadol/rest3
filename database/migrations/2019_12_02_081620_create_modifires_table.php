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
            $table->string('nameAr')->nullable();
            $table->string('nameEn')->nullable();
            $table->string('sku')->nullable();
            $table->float('cost')->default(0);
            $table->float('tax')->default(0);
            $table->float('price')->default(0);
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
