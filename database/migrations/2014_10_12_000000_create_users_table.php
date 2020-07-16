<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('firstName')->nullable('null');
            $table->string('LastName')->nullable('null');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            
            $table->string('note')->nullable('null'); 
            $table->string('image')->nullable('null'); 
            $table->string('businessName')->nullable('null'); 
            $table->string('type')->default('web');

            $table->integer('enable')->default(0);
            $table->integer('active')->default(0);
            $table->integer('payment')->default(0);
            $table->integer('activeStatus')->default(0);
            $table->integer('isAdmin')->default(0);

            $table->integer('subscrib')->default(0);
            $table->integer('agree')->default(0);


            $table->integer('RESTURANT')->default(1);
            $table->integer('ACCOUNTING')->default(2);
            $table->integer('HR')->default(3);

            $table->integer('branch_number')->nullable('null');
            $table->integer('user_number')->nullable('null');
            $table->string('phone')->nullable('null');
            $table->string('country')->nullable('null');
            $table->string('state')->nullable('null');
            $table->string('city')->nullable('null');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
