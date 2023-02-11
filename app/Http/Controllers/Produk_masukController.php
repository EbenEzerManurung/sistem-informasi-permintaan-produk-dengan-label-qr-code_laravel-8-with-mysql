<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\produk_masuk;
use App\Data_produk;
use App\Produk;
use App\Permintaan_produk;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use DataTables;


class Produk_masukController extends Controller
{

   
    

    public function index(Request $request)
    {
        // $data_produk = Data_produk::orderBy('part_name','ASC')
        //  $data_produk = Data_produk::query()->where('trueorfalse', true)->select('part_no','part_name','id_dataproduk')->get();
         $data_produk = Data_produk::query()->select('part_name','id_dataproduk')->get();
        // dd($data_produk);
        // $produk_masuk = produk_masuk::all();
        // return view('produk_masuk.index', compact('data_produk'));

        
        


    
        $list_produk = produk_masuk::leftJoin('data_produk', 'data_produk.id_dataproduk', 'produk_masuk.dataproduk_id')
        ->select('produk_masuk.*', 'data_produk.part_name', 'data_produk.order_no','data_produk.part_no')
        ->orderBy('created_at', 'desc')
        ->get();
        if($request->ajax()){
            return datatables()->of($list_produk)
            ->addColumn('action', function($data){
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_produkmasuk.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-post"><span class="mdi mdi-lead-pencil">Edit</span></a>';
                $button .= '&nbsp;&nbsp;';

                // $button = '<button type="button" name="edit" data-id="'.$data->id_produkmasuk.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-post"><i class="far fa-edit"></i> Edit</button>';
                
                
                // $button = '<button type="button" class= "btn btn-primary" onClick="show({{ $data->id_produkmasuk }})">  </i> Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id_produkmasuk.'" class="delete btn btn-danger btn-sm " >      <span class="mdi mdi-delete">Delete</span>';     
                $button .= '&nbsp;&nbsp;';

    
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
}
return view('produk_masuk.index', compact('list_produk','data_produk'));


}



public function store(Request $request)
{
    $id = $request->id;
    $this->validate($request , [
        'qty'          => 'required',
        'dataproduk_id'   => 'required',
       
    ]);

    $permintaan = Permintaan_produk::where('part_no', Data_produk::where('id_dataproduk',$request->dataproduk_id)->first()->part_no)->first();
    if((int) $request->qty >= (int) $permintaan->qty){
        $status = 'Cukup'; 
                
    }
    // else if($request->qty<= 0){
    //     $status = 'Habis';
    // }
    else{
        $status = 'Tidak cukup';

    }
    Data_produk::where('id_dataproduk',$request->dataproduk_id)->first()->update(['trueorfalse' => false]);
    if($id != null){
        $post   =   produk_masuk::find($id)->updateOrCreate([
            'dataproduk_id' => $request->dataproduk_id,
            'qty' => $request->qty,
            'status' => $status
          
        ]);
    }else{

            $post = produk_masuk::updateOrcreate([
                'dataproduk_id' => $request->dataproduk_id, 
                 'qty' => $request->qty, 
                 'status' => $status,
                //  'APP.sprint ($040', $produk_masuk->kode_produkmasuk). sperintf('%04u', $produk_masuk_count)
                //  'kode_produkmasuk' => 'masuk'.Str::upper(Str::random(3)),
                'kode_produkmasuk' => 'masuk'.sprintf('%04u', produk_masuk::count()+1)
                ]);
           
    }
    return response()->json($post);
}
public function edit($id)
    { 
        $data_produk = Data_produk::orderBy('part_name','ASC')
        ->get()
        ->pluck('part_name','id_dataproduk');
    
        $where = array('id_produkmasuk' => $id);
        // $post  = produk_masuk::where($where)->first();
        $post  = produk_masuk::where($where)->get();
        return response()->json($post);   

        // $post   =   produk_masuk::find($id)->edit([
        //     'dataproduk_id' => $request->dataproduk_id,
        //     'qty' => $request->qty,
        //     'status' => $status
        //     ]);

        //     return response()->json($post); 
    }


    
   
    public function destroy($id)
    {
        $post = produk_masuk::where('id_produkmasuk',$id)->first();
        Data_produk::where('id_dataproduk',$post->dataproduk_id)->first()->update(['trueorfalse' => true]);
        $post->delete();
        return response()->json($post);
    }

   
  

   
    
}
