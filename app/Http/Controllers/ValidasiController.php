<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk_masuk;
use App\Data_produk;
use App\Permintaan_produk;
use App\Produk_keluar;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use DataTables;

class ValidasiController extends Controller
{
   
    

    public function index(Request $request)
    {
        $list_produk = Permintaan_produk::leftJoin('data_produk', 'data_produk.order_no', 'permintaan_produk.order_no')
                                        ->leftJoin('produk_masuk', 'data_produk.id_dataproduk', 'produk_masuk.dataproduk_id')
                                        ->where('permintaan_produk.status', 'waiting    ')
                                        ->select('permintaan_produk.*','produk_masuk.qty as stock', 'produk_masuk.id_produkmasuk')
                                        ->where('produk_masuk.qty','>=' , DB::raw("CONVERT(permintaan_produk.qty, INT)"))
                                        ->orderBy('created_at', 'desc')
                                        ->get();
                                     
        // $list_produk = produk_masuk::leftJoin('data_produk', 'data_produk.id_dataproduk', 'produk_masuk.dataproduk_id')
        // ->select('produk_masuk.*', 'data_produk.part_name', 'data_produk.part_no')
        // ->where('produk_masuk.qty','>=', 'permintaan_produk.qty')
        // ->get();
        if($request->ajax()){
            return datatables()->of($list_produk)
                        ->addColumn('action', function($data){
 
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_produkmasuk.'" data-row="1" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-post"><span class="mdi mdi-checkbox-marked-outline">Confirm</span></a>';

                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
                        
                        
        }
        return view('validasi.index', compact('list_produk'));

       
}
public function store(Request $request)
{
    $id = $request->data_id;
    $produk_masuk = produk_masuk::find($id);
    $permintaan = Permintaan_produk::where('order_no', Data_produk::where('id_dataproduk',$produk_masuk->dataproduk_id)->first()->order_no)->first();
    $new_qty = (int) $produk_masuk->qty ;
     $new_qty = (int) $produk_masuk->qty - (int) $permintaan->qty;
    if((int) $request->qty = (int) $permintaan->qty)
    {
        $status = 'Sudah divalidasi';
    }
   
    else if($request->qty<= 0){
        $status = 'Sudah divalidasi';
    }
    
  
    else {
        $status = 'Tidak Cukup';

    }
    

    // Data_produk::where('id_dataproduk',$request->dataproduk_id)->first()->update(['status' => false]);
    $post = produk_masuk::find($id)->update([
        'qty' => $new_qty,
        'status' => $status

        
    ]);

    
    Produk_keluar::create([
        'status' => 'confirmed',
        'dataproduk_id' => $produk_masuk->dataproduk_id,
        'qty' => (int) $permintaan->qty,
        'kode_produkkeluar' => 'keluar'.sprintf('%04u', Produk_keluar::count()+1)
        
       
  
    ]);  

    // $permintaan->where('status','waiting')->where('order', $request->data_row)->first()->update(['status' =>'confirmed']);
    $permintaan->where('status','waiting')->first()->update(['status' =>'confirmed']);

    
    return response()->json($post);
}
}
