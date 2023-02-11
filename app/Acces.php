<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acces extends Model
{
	protected $table = 'access';
    // Initialize
    protected $fillable = [
        'user', 'kelola_akun',  'permintaan_produk', 'permintaan_produksi', 'data_produk', 'produk_masuk','validasi', 'mencetak_label',  'produk_keluar'
        
    ];
}
