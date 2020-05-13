<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('printers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable('null');
            $table->string('enName')->nullable('null');
            $table->string('printer')->nullable('null');
            $table->string('printerName')->nullable('null');
            $table->integer('printerIndex')->defualt(0);
            $table->integer('copiesNumber')->defualt(0);
            $table->string('note')->nullable();

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
        Schema::dropIfExists('printers');
    }
}
