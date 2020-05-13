<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('number')->nullable('null');
            $table->integer('dailyNumber')->nullable('null');
            $table->string('date')->nullable('null'); 
            $table->string('billDate')->nullable('null');
            $table->string('delivaryDate')->nullable('null');
            $table->integer('billSatate')->nullable('null');
            $table->float('total')->nullable('null');
            $table->float('discount')->nullable('null');
            $table->float('discountPerCent')->nullable('null');
            $table->float('extra')->nullable('null');
            $table->float('tax')->nullable('null');
            $table->float('sevice')->nullable('null');
            $table->string('note')->nullable('null');
            $table->integer('printredCount')->nullable('null');
            //$table->float('rePayment')->nullable('null');
            //$table->string('curancyType')->nullable('null'); to  order repayment
            $table->float('remain')->nullable('null'); 


            $table->uuid('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches');

            $table->uuid('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');


            $table->uuid('table_id');
            $table->foreign('table_id')->references('id')->on('tables');

            $table->uuid('paymentType');
            $table->foreign('paymentType')->references('id')->on('payments')->change();

            // $table->uuid('floor_id');
            // $table->foreign('floor_id')->references('id')->on('floors');

            $table->uuid('bill_id');
            $table->foreign('bill_id')->references('id')->on('bill_kinds');

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
        Schema::dropIfExists('orders');
    }
}
