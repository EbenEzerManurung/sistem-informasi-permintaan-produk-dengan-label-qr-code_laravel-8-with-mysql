<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProdukMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_masuk', function (Blueprint $table) {
                $table->id('id_produkmasuk', 10);
                $table->string('kode_produkmasuk')->length(10);
                $table->integer('qty')->length(10);
                $table->string('uom')->default('unit');
                $table->foreignId('dataproduk_id');
                $table->enum('status', ['Cukup', 'Tidak Cukup', 'sudah divalidasi']);
                $table->foreign('dataproduk_id')->references('id_dataproduk')->on('data_produk');
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
        Schema::dropIfExists('produk_masuk');
    }
}
