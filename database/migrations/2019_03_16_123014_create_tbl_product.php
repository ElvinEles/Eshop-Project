<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
          $table->increments('product_id');
          $table->string('product_name');/
          $table->string('product_photo');
          $table->bigInteger('product_category');
          $table->float('product_price');
          $table->float('product_old_price');
          $table->bigInteger('product_active');
          $table->bigInteger('product_sale');
          $table->bigInteger('product_time');
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
        Schema::dropIfExists('tbl_product');
    }
}
