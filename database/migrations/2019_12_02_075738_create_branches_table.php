<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->string('slugable')->nullable('null');
            $table->string('delivery_price')->nullable('null');
            $table->string('address_address')->nullable('null');
            $table->string('monday_from')->nullable('null');
            $table->string('monday_to')->nullable('null');
            $table->string('tuesday_from')->nullable('null');
            $table->string('tuesday_to')->nullable('null');
            $table->string('wednesday_from')->nullable('null');
            $table->string('wednesday_to')->nullable('null');
            $table->string('Wednesdayfrom')->nullable('null');
            $table->string('Wednesdayto')->nullable('null');
            $table->string('thursday_from')->nullable('null');
            $table->string('thursday_to')->nullable('null');
            $table->string('friday_from')->nullable('null');
            $table->string('friday_to')->nullable('null');
            $table->string('saturday_from')->nullable('null');
            $table->string('saturday_to')->nullable('null');
            $table->string('sunday_from')->nullable('null');
            $table->string('sunday_to')->nullable('null');
            $table->float('tax')->nullable('null');
            $table->string('phone')->nullable('null');

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
        Schema::dropIfExists('branches');
    }
}
