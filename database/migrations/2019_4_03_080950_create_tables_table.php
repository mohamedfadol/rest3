<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->string('name')->nullable('null');
            $table->integer('number')->nullable('null');
            $table->integer('chairsNumber')->nullable('null');
            $table->integer('maxChairsNumber')->nullable('null');
            $table->integer('status')->defualt(0);

            $table->uuid('floor_id');
            $table->foreign('floor_id')->references('id')->on('floors');

            $table->uuid('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches');

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
        Schema::dropIfExists('tables');
    }
}
