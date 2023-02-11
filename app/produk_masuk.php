<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class produk_masuk extends Model
{
    use HasFactory;
    protected $table = 'produk_masuk';
    protected $primaryKey = 'id_produkmasuk';
    protected $foreignKey = 'produkmasuk_id';
    protected $fillable = ['produkmasuk_id', 'kode_produkmasuk',  'qty', 'dataproduk_id','status', 'created_at->timestamp', 'updated_at'];  




    public function data_produk()
    {
        return $this->belongsTo('App\Data_produk', 'dataproduk_id', 'order_no','part_no', 'part_name');
    }
    

    // public function getCreatedAtFormattedAttribute()
    // {
    //    return $this->created_at->format('H:i d, M Y');
    //    $today = Carbon::now()->format('Y-m-d');
    // }
 
    public function permintaan_produk()
    {
        return $this->belongsTo('App\Permintaan_produk', 'dataproduk_id');
  
    }

    public function produkmasuk()
    {
        return $this->belongsTo('App\Permintaan_produk', 'dataproduk_id');
  
    }
   

    public function getFormattedDateAttribute()
{
    return $this->created_at->format('d-m-Y H:i');
}

protected $appends = ['formatted_date'];


}


