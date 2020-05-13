<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_reserves', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('customerPhone')->nullable('null');
            $table->string('dateFrom')->nullable('null');
            $table->string('dateTo')->nullable('null');
            $table->float('payment')->nullable('null');
            $table->float('paymentMinorder')->nullable('null');
            $table->float('minorderValue')->nullable('null');
            $table->float('enterFee')->nullable('null');
            $table->string('note')->nullable('null');
            $table->string('startDate')->nullable('null');
            $table->float('total')->nullable('null');
            
            $table->uuid('addByUserId');
            $table->foreign('addByUserId')->references('id')->on('users'); 

            // $table->uuid('customer_id');
            // $table->foreign('customer_id')->references('id')->on('customers');

            $table->uuid('floor_id');
            $table->foreign('floor_id')->references('id')->on('floors');
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
        Schema::dropIfExists('table_reserves');
    }
}
