<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblNewcollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_newcollection', function (Blueprint $table) {
            $table->bigIncrements('newcollection_id');
            $table->bigInteger('newcollection_product_id');
            $table->bigInteger('newcollection_day');
            $table->bigInteger('newcollection_hour');
            $table->bigInteger('newcollection_minute');
            $table->bigInteger('newcollection_second');
            $table->string('newcollection_tema');
            $table->string('newcollection_sale');
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
        Schema::dropIfExists('tbl_newcollection');
    }
}
