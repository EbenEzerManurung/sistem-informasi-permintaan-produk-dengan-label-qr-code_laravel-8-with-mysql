<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access', function (Blueprint $table) {
    
            $table->increments('id', 10);
            $table->boolean('user', 4);
            $table->boolean('kelola_akun', 4);
            $table->boolean('permintaan_produk', 4);
            $table->boolean('permintaan_produksi', 4);
            $table->boolean('formpermintaan_produksi')->length(4);
            $table->boolean('data_produk', 4);
            $table->boolean('produk_masuk', 4);
            $table->boolean('validasi', 4);
            $table->boolean('mencetak_label', 4);
            $table->boolean('produk_keluar', 4);
        
            $table->timestamps();
            Schema::defaultStringLength(191);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access');
    }
}
