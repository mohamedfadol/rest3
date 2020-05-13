<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('deviceName')->nullable('null');
            $table->string('date')->nullable('null');
            $table->string('cardName')->nullable('null');
            $table->integer('cardNumber')->nullable('null');
            $table->string('oldValue')->nullable('null');
            $table->string('newValue')->nullable('null');
            
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
        Schema::dropIfExists('log_files');
    }
}
