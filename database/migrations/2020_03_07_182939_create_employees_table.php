<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('firstName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('type')->default('app');
            $table->string('binCode')->unique();
            $table->string('remember_token')->nullable();

            $table->uuid('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches');

            $table->uuid('floor_id')->nullable();
            $table->foreign('floor_id')->references('id')->on('floors');

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
        Schema::dropIfExists('employees');
    }
}
