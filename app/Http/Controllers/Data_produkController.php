<?php

namespace App\Http\Controllers;
use App\Data_produk;
use DataTables;

use Illuminate\Http\Request;

class Data_produkController extends Controller
{
    // public function index(Request $request)
    // {
    //     $lis`t_produk = Data_produk::all();
       
    //     if($request->ajax()){
    //         return datatables()->of($list_produk)
    //                     ->addColumn('action', function($data){
    //                         $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_dataproduk.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
    //                         $button .= '&nbsp;&nbsp;';
    //                         $button .= '<button type="button" name="delete" id="'.$data->id_dataproduk.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
    //                         return $button;
    //                     })
    //                     ->rawColumns(['action'])
    //                     ->addIndexColumn()
    //                     ->make(true);
    //     }

    //     return view('data_produk.index');

    // }

    public function index()
    {
        
        $data_produk = Data_produk::latest()->paginate(20);
        return view ('data_produk.index',compact('data_produk'))->with('i', (request()->input('page', 1) -1) * 5);
    }

   
}
