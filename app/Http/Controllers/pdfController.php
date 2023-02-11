<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use PDF;

use App\Http\Requests;
use App\Produk_keluar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Data_produk;
use App\Permintaan_produk;




class pdfController extends Controller
{
    

    public function index()
    {
        // $commodities = Produk_keluar::all();
     
       

        $pdfs  = Produk_keluar::leftJoin('data_produk', 'data_produk.id_dataproduk', 'produk_keluar.dataproduk_id')
        ->select('data_produk.*', 'produk_keluar.qty', 'produk_keluar.id_produkkeluar', 'produk_keluar.uom', 'data_produk.part_no','produk_keluar.created_at' )
        // ->orderBy('part_no', 'asc')
        ->get();

        return view('mencetak_label.cetak1', compact('pdfs'));


    }

    public function generatePdfOne($id)
    {
        $pdfone = Produk_keluar::find($id);
        $data_produk = Data_produk::find($id);
        $permintaan_produk = Permintaan_produk::find($id);
        $pdf = PDF::loadView('mencetak_label.cetak', compact(['pdfone', 'data_produk', 'permintaan_produk']))->setPaper('a4', 'portrait');

        return $pdf->stream('labelqrcode.pdf');
    }




            public function generatePdf()
            
            {
                
                $pdfs = Produk_keluar::all();
    
      
                $pdf = PDF::loadView('mencetak_label.all', compact(['pdfs']))->setPaper('a4', 'portrait');
        
                return $pdf->stream('all_labelqrcode.pdf');
      
    }
}
