<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_kinds', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('BillKindNumber')->nullable('null'); 
            $table->string('BillKindName')->nullable('null'); 
            $table->string('BillKindNameEnglish')->nullable('null');
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
        Schema::dropIfExists('bill_kinds');
    }
}
