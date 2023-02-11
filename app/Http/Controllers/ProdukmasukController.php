<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\produk_masuk;
use App\Permintaan_produk;
use App\Data_produk;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


use DataTables;

class ProdukmasukController extends Controller
{

 
  public function tambah()
  {
      $data_produk= Data_produk::all();
      return view('produkmasuk.create', compact('data_produk'));
      
  }

  public function index()
  {
      
      $produk_masuk = produk_masuk::latest()->paginate(10);
      return view ('produkmasuk.index',compact('produk_masuk'))->with('i', (request()->input('page', 1) -1) * 5);
  }



  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('produkmasuk.create');
  }

  // public function store(Request $request)
  // {

  //     $request->validate([
  //       //  'id_produkmasuk' => 'required',
  //       // 'kode_produkmasuk' => 'required',
  //       'dataproduk_id' => 'required',
  //         'qty' => 'required',
  //       //   'status' => 'required',
          

       
  //     ]);
     

    

  //    produk_masuk::create([
  //      'id_produkmasuk' => $request-> id_produkmasuk,
  //      'kode_produkmasuk' => $request->kode_produkmasuk,
  //       'dataproduk_id' => $request-> dataproduk_id,
  //        'qty' => $request->qty, 
        
  //       'kode_produkmasuk' => 'masuk'.sprintf('%04u', produk_masuk::count()+1)
  //       ]);

     


  //       return redirect()->route('produkmasuk.index')->with('create_succes','Data Berhasil di Input');

        
  // }
  public function store(Request $request)
  
{
    $id = $request->id;
    $this->validate($request , [
        'qty'          => 'required',
        'dataproduk_id'   => 'required',
       
    ]);

    Session::flash('sukses','Data Permintaan produk Berhasil Diinput!');

    $permintaan = Permintaan_produk::where('order_no', Data_produk::where('id_dataproduk',$request->dataproduk_id)->first()->order_no)->first();
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

            $post =  produk_masuk::create([
                'dataproduk_id' => $request->dataproduk_id, 
                 'qty' => $request->qty, 
                 'status' => $status,
                //  'APP.sprint ($040', $produk_masuk->kode_produkmasuk). sperintf('%04u', $produk_masuk_count)
                //  'kode_produkmasuk' => 'masuk'.Str::upper(Str::random(3)),
                'kode_produkmasuk' => 'masuk'.sprintf('%04u', produk_masuk::count()+1)
                ]);
                
           
              }
              	// notifikasi dengan session
                Session::flash('createsuccess', 'Data berhasil diinput');

                return redirect('/produkmasuk');
            // return  redirect()->route('produkmasuk.index')->with('sukses');
}

public function edit(produk_masuk $produkmasuk)
  {
    
    
      return view('produkmasuk.edit', compact('produkmasuk'));

  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
 

  
  public function update(Request $request, produk_masuk $produkmasuk)
    {
        $request->validate([
            'qty'          => 'required',
            // 'dataproduk_id'   => 'required',
            
        ]);

        $produkmasuk->update($request->all());

        
      Session::flash('edit_success', 'Data berhasil di Edit');

      return redirect('/produkmasuk');
    }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(produk_masuk $produkmasuk)
  {
      $produkmasuk->delete();

      Session::flash('create_success', 'Data berhasil di hapus');

      return redirect('/produkmasuk');

    //   return redirect()->route('produkmasuk.index')->with('succes','Data Berhasil di Hapus');
  }
}