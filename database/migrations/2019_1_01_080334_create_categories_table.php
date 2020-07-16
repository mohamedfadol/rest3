<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('sku')->nullable();
            $table->string('timedEventFrom')->nullable('null');
            $table->string('timedEventTo')->nullable('null');
            $table->integer('active')->default(0);
            $table->string('cat_id')->nullable('null');
            $table->longText('image')->nullable('null');
            $table->uuid('addByUserId');
            $table->foreign('addByUserId')->references('id')->on('users');
            $table->timestamps();
        });

        DB::statement('ALTER Table categories add code INTEGER NOT NULL  UNIQUE  AUTO_INCREMENT;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
