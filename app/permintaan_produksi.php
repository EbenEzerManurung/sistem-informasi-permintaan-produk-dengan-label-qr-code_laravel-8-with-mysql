<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permintaan_produksi extends Model
{
    protected $table = 'permintaan_produksi';

    protected $fillable = [
        'id',  'pic', 'actual', 'shift', 'plant_area', 'keterangan' , 'status', 'date'
    ];

    public function permintaan_produk()
    {
        return $this->belongsTo(Permintaan_produk::class , 'permintaanproduk_id')  ;
       
    	
    }

    
       
    }

