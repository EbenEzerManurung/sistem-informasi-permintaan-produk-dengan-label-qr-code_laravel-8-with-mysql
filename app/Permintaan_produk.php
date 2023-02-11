<?php

namespace App;

use App\Support\UserCollection;
use Illuminate\Database\Eloquent\Model;

class Permintaan_produk extends Model
{
    protected $table = 'permintaan_produk';

    protected $fillable = [
        'order_no',
        'part_no',
        'part_name',
        'customer',
        'qty',
        'uom',
        'date',
        'status',
        'keterangan',
        'pic',
    ];

    // public function permintaan_produksi()
    // {
    //     return $this->hasMany('App\permintaan_produksi');
    // }

    // public function produk_keluar()
    // {
    // 	return $this->belongsTo(Produk_keluar::class);
    // }

    public function produk_keluar()
    {
    	return $this->hasMany(Produk_keluar::class);
    }

    public function produk_masuk()
    {
    	return $this->hasMany(produk_masuk::class);
    }

    public function produkmasuk()
    {
    	return $this->hasMany(produk_masuk::class);
    }
}
