<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProdukKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_keluar', function (Blueprint $table) {
          
            $table->id('id_produkkeluar', 10);
               $table->string('kode_produkkeluar');
         
                $table->enum('status', ['waiting', 'confirmed']);
                $table->foreignId('dataproduk_id');
                $table->foreign('dataproduk_id')->references('id_dataproduk')->on('data_produk');
                $table->integer('qty');
                $table->string('uom')->default('unit');
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
        Schema::dropIfExists('produk_keluar');
    }
}