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

class Permintaan_produksiController extends Controller
{
    public function index()
	{
		$permintaan_produk = permintaan_produk::paginate(10);
      
		// dd($permintaan_produk);
    	return view('permintaan_produksi.index', compact('permintaan_produk'));
        // return redirect('/permintaan_produksi');
	}

	public function update(Request $request, $id)
    {
        $permintaan_produk = permintaan_produk::find($id);

        $permintaan_produk->update([
                'keterangan' => 'confirmed'
                ]);
      

				Session::flash('create_success','Data telah dikonfirmasi!');

				return back();
				
   
		return redirect('/permintaan_produksi');
    }

		
       
    

	public function destroy($id)
    {
       
	
    }
 
}
