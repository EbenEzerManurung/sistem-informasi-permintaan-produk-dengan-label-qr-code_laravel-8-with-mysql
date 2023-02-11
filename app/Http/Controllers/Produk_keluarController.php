<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Produk_keluar;
use App\Data_produk;
use App\Permintaan_produk;
use DataTables;
use PDF;
use Illuminate\Support\Facades\DB;




class Produk_keluarController extends Controller
{
    public function index(Request $request)
    {
   
       
        $produk_keluar = produk_keluar::leftJoin('permintaan_produk', 'permintaan_produk.id', 'produk_keluar.dataproduk_id', 'produk_keluar.order_no', 'permintaan_produk.id')



        ->select('permintaan_produk.*',  'produk_keluar.qty','produk_keluar.uom', 'produk_keluar.kode_produkkeluar' )
        ->orderBy('created_at', 'desc')
        ->get();
        if($request->ajax()){
            return datatables()->of($produk_keluar)
                       
        
                        ->addIndexColumn()
                        ->make(true);
        }
      
        return view('produk_keluar.index', compact('produk_keluar'));
    }


        public function exportprodukkeluarAll(Request $request)
        { 
            $produk_keluar = array();
        
            

            $produk_keluar = produk_keluar::all();
                $pdf = PDF::loadView('produk_keluar.exportpdf',compact('produk_keluar'))->setPaper('a4', 'portrait');
            return $pdf->stream('cetak_produkkeluar.pdf');
        }


    
}
