<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class produksi_permintaan extends Model
{
    protected $table = 'produksi_permintaan';

    protected $fillable = [
        'part_no', 'part_name', 'customer', 'qty' ,  'date'
    ];

    public function permintaan_produk()
    {
        return $this->belongsTo('App\Permintaan_produk');
    	
    }

    

}
