<?php

namespace App\Http\Controllers;


use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\ Permintaan_produk;
use Auth;
use App\Http\Requests;
use Yajra\DataTables\DataTables;
use App\ permintaan_produknew;

class Permintaan_produksiNew extends Controller
{
    public function home()
    {
        $permintaan_produk = Permintaan_produk::all();
        return view('Permintaan_produksi-new.create', compact('permintaan_produk'));
        
    }
   

    public function store(Request $request)
    {
       permintaan_produknew::create($request->all());

        Session::flash('create_success', 'permintaan produksi berhasil dibuat');

    	    	return redirect('/permintaan-produksi');
    }

    

    public function viewproduk_masuk()
    {
        $produk_masuky =  permintaan_produknew::orderBy('created_at', 'desc')
    
            ->get();
        return view('permintaan_produksi-new.index', compact('produk_masuky'));
    }

    public function permintaanproduksi()
    {
        $produk_masuky =  permintaan_produknew::orderBy('created_at', 'desc')
    
            ->get();
        return view('permintaan_produksi-new.permintaanproduksi', compact('produk_masuky'));
    }


    public function edit($id)
    {
        $permintaan_produknew =  permintaan_produknew::findOrFail($id);
        return view('Permintaan_produksi-new.edit', compact('permintaan_produknew'));
    }
    
    public function update(Request $request, $id)
    {

        $produk_masuky = permintaan_produknew::find($id);
        
        $produk_masuky->update([
            'status' => 'confirmed'
            ]);
  

            Session::flash('create_success','Data telah dikonfirmasi!');

            return back();
        
        return redirect('/permintaan-index');
    }

    


    public function delete($id)
    {
        permintaan_produknew::destroy($id);
        return back();
    }

   
}


