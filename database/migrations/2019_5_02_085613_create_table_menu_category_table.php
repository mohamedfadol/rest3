<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMenuCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_category', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->uuid('menu_id')->nullable('null');
            $table->uuid('category_id')->nullable('null');

            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('menu_category');
    }
}
