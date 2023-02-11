<?php


namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Produk_keluar;

use PDF;
use Yajra\DataTables\DataTables;




class CetakQrController extends Controller
{
    

    public function index(Request $request)
    {
   

        $list_produk = Produk_keluar::leftJoin('data_produk', 'data_produk.id_dataproduk', 'produk_keluar.dataproduk_id')
        ->select('data_produk.*', 'produk_keluar.qty')
        // ->orderBy('part_no', 'asc')
        ->get();
  
                        if($request->ajax()){
                            return DataTables::of($list_produk)
                                        ->addColumn('action', function($produk_keluar){
                                           
                                          
                                            // {{ route('user.attendance', ['id' => 1]) }} [ 'product_id' => $i->id ]
                                            // $button = '<div class="row"><a href="'.route('cetakPDF.labelpdf' ,[ 'id'=>$produk_keluar -> id_produkkeluar]).'"class="btn btn-primary" >
                                            // <span class="mdi mdi-printer"></span>Cetak
                                     
                                            // </a>';

                                            $button = '<div class="row"><a href="'.route('cetakPDF.labelpdf', $produk_keluar->id).'"class="btn btn-primary">
                                            <span class="mdi mdi-printer-settings"></span>Cetak
                                            </a>';
                                            
                                            
                                            return $button;
                                            
                                          
                
                                        })
                                        ->addColumn('select_all', function ($produk_keluar) {
                                            return '
                                                <input type="checkbox" name="id_produk[]" value="'. $produk_keluar->id_produkkeluar .'">
                                            ';
                                        })
                                        ->rawColumns(['action','select_all' ])
                                        ->addIndexColumn()
                                        ->make(true);
                        }
        
      
        return view('mencetak_label.index', compact('list_produk'));
}

// public function exportcetaklabel(Request $request)
//         { 
           

//             $produk_keluar = produk_keluar::all();
//                 $pdf = PDF::loadView('mencetak_label.cetak',compact('produk_keluar'))->setPaper('a4', 'portrait');
//             return $pdf->stream('cetak_labelqrcode.pdf');
            
//         }

    //     public function exportcetaklabel(Request $request)
    // {
    //     $dataproduk = array();
    //  foreach($request->id_produkkeluar as $id) {
    //         $produk_keluar = Produk_keluar::find($id);
    //         $dataproduk[] = $produk_keluar;
    //     }

        

    // public function exportcetaklabel( $id)
    //     { 
    
    //         dd($request->all());
    //         $pdf = PDF::loadView('mencetak_label.cetak',compact('produk_keluar'))->setPaper('a4', 'portrait');
    //         return $pdf->stream('cetak_labelqrcode.pdf');
   

            
    //         $pdf = PDF::loadView('mencetak_label.cetak',compact('dataproduk'))->setPaper('a4', 'portrait');
    //     return $pdf->stream('cetak_labelqrcode.pdf');

    public function exportProductMasuk($id)
    {
        $product_masuk = Product_Masuk::findOrFail($id);
        $pdf = PDF::loadView('product_masuk.productMasukPDF', compact('product_masuk'));
        return $pdf->download($product_masuk->id_produkkeluar.'_product_masuk.pdf');


    }
        
    // public function exportcetaklabel($id)
    //     { 
     
    //         $produk_keluar  = Produk_keluar::find($id)
    //         ->where('id_produkkeluar', $id)
    //             ->first();
    //         // $produk_keluar->exportcetaklabel($request->first());
    //         // $produk_keluar = Produk_keluar::findOrFail($id);
    //         $pdf = PDF::loadView('mencetak_label.cetak',compact('produk_keluar'));
    //         return $pdf->download('cetak_label.pdf')->setPaper('a4', 'portrait');
                                   
    //     }

        public function exportcetaklabel($id)
        {
            $commodity = Produk_keluar::find($id);
            $sekolah = env('NAMA_SEKOLAH', 'Barang Milik Sekolah');
            $pdf = PDF::loadView('mencetak_label.cetak', compact(['commodity']))->setPaper('a4', 'portrait');
    
            return $pdf->download('print.pdf');

        

        }

        public function bayar($nisn)
        {	
            $siswa = Siswa::with(['kelas'])
                ->where('nisn', $nisn)
                ->first();
    
            $spp = Spp::all();
    
            return view('pembayaran.bayar', compact('siswa', 'spp'));
        }

        
        
 public function destroy($id)
 {
     $post = Data_produk::where('id_dataproduk',$id)->delete();
  
     return response()->json($post);
 }

    //     public function update(Request $request, $id)
    // {
    //     $produk = Produk::find($id);
    //     $produk->update($request->all());

    //     return response()->json('Data berhasil disimpan', 200);
    // }

        
   
    //     public function cetakBarcode(Request $request)
    // {
    //     $dataproduk = array();
    //     foreach ($request->id_produk as $id) {
    //         $produk = Produk::find($id);
    //         $dataproduk[] = $produk;
    //     }

    //     $no  = 1;
    //     $pdf = PDF::loadView('produk.barcode', compact('dataproduk', 'no'));
    //     $pdf->setPaper('a4', 'potrait');
    //     return $pdf->stream('produk.pdf');
    // }

    
    public function generatePdfOne($id)
    {
        $commodity = Commodity::find($id);
        $sekolah = env('NAMA_SEKOLAH', 'Barang Milik Sekolah');
        $pdf = PDF::loadView('commodities.pdfone', compact(['commodity', 'sekolah']))->setPaper('a4');

        return $pdf->download('print.pdf');
    }

    //     $pdf = PDF::loadView('mencetak_label.cetak', compact('dataproduk'));
    //     $pdf->setPaper('a4', 'potrait');
    //     return $pdf->stream('cetak_labelqrcode.pdf');
        
    // }

    // public function exportcetaklabel($id)
    // { 

    //     $produk_keluar = array();
    //     foreach ($request->id_produkkeluar as $id) {
    //         $produk_keluar= produk_keluar::find($id);
    //         $produk_keluar[] = $list_produk;
    //     }
       
    //         $pdf = PDF::loadView('mencetak_label.cetak',compact('produk_keluar'))->setPaper('a4', 'portrait');
    //     return $pdf->stream('cetak_labelqrcode.pdf');
        
    // }
   

    
}