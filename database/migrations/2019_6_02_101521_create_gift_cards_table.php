<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_cards', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->string('type')->nullable('null');
            $table->string('amount')->nullable('null');
            $table->string('ValidFrom')->nullable('null');
            $table->string('validTo')->nullable('null');
            $table->string('couponNumber')->nullable('null');
            $table->enum('validOn', ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'])->nullable('null');
 
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
        Schema::dropIfExists('gift_cards');
    }
}
