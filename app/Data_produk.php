<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_produk extends Model
{
    protected $table = "data_produk";

    protected $primaryKey = 'id_dataproduk';
    
    protected $guarded = ['id_dataproduk'];

    protected $fillable = ['id_dataproduk','order_no', 'part_no', 'part_name','customer', 'trueorfalse'];  


    public function produk_masuks()
    {
        return $this->hasMany('App\produk_masuk', 'dataproduk_id');
        
    }

    public function data_produk()
    {
    	return $this->belongsTo(Data_produk::class);
    }

    public function produk_keluar()
    {
    	return $this->hasMany(Produk_keluar::class);
    }

    public function produk_masuk()
    {
    	return $this->hasMany(produk_masuk::class);
    }

}
