<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            
            $table->uuid('id')->primary(); 
            $table->string('nameAr')->nullable('null');
            $table->string('descriptionAr')->nullable('null');
            $table->string('nameEn')->nullable('null');
            $table->string('descriptionEn')->nullable('null');
            $table->string('note')->nullable('null');
            $table->string('sku')->nullable();
            $table->string('price')->nullable('null');
            $table->enum('sellType', ['unit' , 'weight'])->nullable('null');
            $table->float('tax')->nullable('null');
            $table->string('timedEventFrom')->nullable('null');
            $table->string('timedEventTo')->nullable('null');
            $table->integer('active')->defualt(0);

            // $table->uuid('class_id')->nullable();
            // $table->foreign('class_id')->references('id')->on('class_products');

            $table->uuid('printer_id');
            $table->foreign('printer_id')->references('id')->on('printers');

            $table->uuid('class_id');
            $table->foreign('class_id')->references('id')->on('class_products');

            $table->uuid('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
 

            $table->uuid('addByUserId');
            $table->foreign('addByUserId')->references('id')->on('users');
            $table->timestamps();
        });

         DB::statement('ALTER Table products add code INTEGER NOT NULL  UNIQUE AUTO_INCREMENT;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
