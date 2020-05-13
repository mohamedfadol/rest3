<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable('null');
            $table->string('nationality')->nullable('null');
            $table->string('email')->nullable('null');
            $table->string('phone')->nullable('null');
            $table->string('country')->nullable('null');
            $table->string('state')->nullable('null');
            $table->string('city')->nullable('null');
            $table->string('area')->nullable('null');
            $table->string('street')->nullable('null');
            $table->string('creditCard')->nullable('null');
            $table->float('discount')->nullable('null');
            $table->string('note')->nullable('null');
            
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
        Schema::dropIfExists('customers');
    }
}
