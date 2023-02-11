<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\produk_masuk;
use App\Data_produk;
use App\Produk;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use DataTables;


class produk_newController extends Controller
{
    public function index()
    {
        $data_produk = Data_produk::orderBy('part_name','ASC')
            ->get()
            ->pluck('part_name','id_dataproduk');

        

        $masuk = produk_masuk::all();
        return view('produk123.index', compact('data_produk', 'masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'dataproduk_id'     => 'required',
           
           'qty'            => 'required',
    
        
        ]);

        $input = $request->all();

  
        $input =    produk_masuk::create([
        'dataproduk_id' => $request->dataproduk_id, 
         'qty' => $request->qty, 
        
         'kode_produkmasuk' => 'masuk'.Str::upper(Str::random(3)),
        ]);

        
        return response()->json(
            [
            'success'    => true,
            'message'    => 'Produk masuk Created'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk_masuk = produk_masuk::find($id);
        return $produk_masuk;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dataproduk_id'     => 'required',

            'qty'            => 'required',
     
        ]);

        $produk_masuk = produk_masuk::findOrFail($id);
        $produk_masuk->update($request->all());

    

        return response()->json([
            'success'    => true,
            'message'    => 'Produk masuk Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    produk_masuk::destroy($id);

        return response()->json([
            'success'    => true,
            'message'    => 'produk_masuks Delete Deleted'
        ]);
    }



    public function apiproduk_masuksOut(){
        $produk_masuk = produk_masuk::all();

        return Datatables::of($data_produk)
            ->addColumn('produk_masuk_name', function ($produk_masuk){
                return $produk_masuk->data_produk->part_name;
            })
           
            ->addColumn('action', function($produk_masuk){
                return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> ' .
                    '<a onclick="editForm('. $produk_masuk->id_produkmasuk .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData('. $produk_masuk->id_produkmasuk .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['produk_masuks_name','action'])->make(true);

    }

  
}