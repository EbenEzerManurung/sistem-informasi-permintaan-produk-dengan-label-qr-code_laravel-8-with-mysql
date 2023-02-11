<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
class Produk_keluar extends Model
{
    
    use HasFactory;
    protected $table = 'produk_keluar';
    protected $primaryKey = 'id_produkkeluar';
    protected $foreignKey = 'dataproduk_id' ;

    
    protected $fillable = ['produkkeluar_id','status',  'kode_produkkeluar', 'dataproduk_id', 'permintaanproduk_id', 'qty', 'uom', 'created_at->timestamp', 'updated_at'];  

    public function data_produk()
    {
        return $this->belongsTo('App\Data_produk', 'dataproduk_id');
    }

    public function permintaan_produk()
    {
        return $this->belongsTo('App\Permintaan_produk', 'dataproduk_id');
  
    }

    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d-m-Y H:i');
    }
    
    protected $appends = ['formatted_date'];
}
