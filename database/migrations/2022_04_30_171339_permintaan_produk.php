<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermintaanProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_produk', function (Blueprint $table) {
         
            $table->id('id', 10);
            $table->string('order_no' )->length(30);
            $table->string('part_no')->length(30);
            $table->string('part_name')->length(50);
            $table->string('customer')->length(20);
            $table->integer('qty')->length(4);
            $table->string('uom')->default('unit');
            $table->string('date');
            $table->enum('status', ['waiting','confirmed' ]);
            $table->enum('keterangan', ['waiting','confirmed' ]);
            // $table->string('pic', 50)->nullable()->change();
            // $table->string('pic')->length(50)->unsigned()->nullable(true)->change();
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
        Schema::dropIfExists('permintaan_produk');
    }
}
