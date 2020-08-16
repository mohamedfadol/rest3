<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('number')->nullable();
            $table->integer('dailyNumber')->nullable();
            $table->string('date')->nullable();
            $table->string('billDate')->nullable();
            $table->string('delivaryDate')->nullable();
            $table->integer('billSatate')->nullable();
            $table->float('total')->nullable();
            $table->float('discount')->nullable();
            $table->float('discountPerCent')->nullable();
            $table->float('extra')->nullable();
            $table->float('tax')->nullable();
            $table->float('sevice')->nullable();
            $table->string('note')->nullable();
            $table->integer('printredCount')->nullable();
            $table->float('remain')->nullable();

            $table->uuid('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches');

            $table->uuid('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->uuid('table_id');
            $table->foreign('table_id')->references('id')->on('tables');

            $table->uuid('paymentType');
            $table->foreign('paymentType')->references('id')->on('payments');

            $table->uuid('bill_id');
            $table->foreign('bill_id')->references('id')->on('bill_kinds');

            $table->uuid('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');

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
