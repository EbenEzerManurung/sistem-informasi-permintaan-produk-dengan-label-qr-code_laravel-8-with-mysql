<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $foreignKey = 'dataproduk_id';
    protected $fillable = [ 'qty', 'dataproduk_id', 'created_at->timestamp', 'updated_at'];  

    public function data_produk()
    {
        return $this->belongsTo('App\Data_produk', 'dataproduk_id');
    }

}
