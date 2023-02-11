<?php


namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Produk_keluar;
use App\Data_produk;
use App\Permintaan_produk;
use DataTables;
use PDF;


class ProdukkeluarController extends Controller
{
    public function index()
    {
        $produk_keluar = Produk_keluar::latest()->paginate(5);
        return view ('produkkeluar.index',compact('produk_keluar'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    public function exportprodukkeluarAll(Request $request)
    { 
        $produk_keluar = array();
    
        $produk_keluar = produk_keluar::all();
            $pdf = PDF::loadView('produkkeluar.exportpdf',compact('produk_keluar'))->setPaper('a4', 'portrait');
        return $pdf->stream('cetak_produkkeluar.pdf');
    }
}
