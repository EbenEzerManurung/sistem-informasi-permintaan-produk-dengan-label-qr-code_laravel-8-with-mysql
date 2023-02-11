<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_produk', function (Blueprint $table) {
            $table->id('id_dataproduk')->length(10);
            $table->string('order_no')->length(30);
            $table->string('part_no')->length(30);
            $table->string('part_name')->length(50);
            $table->string('customer')->length(20);
            $table->boolean('trueorfalse')->default(true);
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
        Schema::dropIfExists('data_produk');
    }
}
