<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permintaan_produknew extends Model
{
    public $table = "permintaan_produksi";
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $foreignKey = 'permintaanproduksi_id';
    protected $fillable = ['id', 'pic', 'permintaanproduksi_id', 'actual', 'shift', 'plant_area', 'keterangan' , 'status',];

    public function permintaan_produk()
    {
        return $this->belongsTo('App\Permintaan_produk', 'permintaanproduksi_id');
    }
}
