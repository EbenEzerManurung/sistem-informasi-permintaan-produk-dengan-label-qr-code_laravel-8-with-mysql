<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermintaanProduksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_produksi', function (Blueprint $table) {
         
            $table->id('id', 10);
            $table->string('pic')->length(50);
            $table->foreignId('permintaanproduksi_id');
                $table->foreign('permintaanproduksi_id')->references('id')->on('permintaan_produk');
            $table->integer('actual')->length(4);
            $table->integer('shift')->length(2);
            $table->string('plant_area')->length(20);
            $table->string('keterangan')->length(100);
            $table->enum('status', ['waiting','confirmed' ]);
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
        Schema::dropIfExists('permintaan_produksi');
    }
}
