<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\ Permintaan_produk;
use App\  permintaan_produksi;
use Auth;

class Produksipermintaan extends Controller
{
	
    public function index()
	{
		$permintaan_produk = permintaan_produk::paginate(10);
      
		// dd($permintaan_produk);
    	return view('permintaan_produk.produksi_permintaan', compact('permintaan_produk'));
        // return redirect('/permintaan_produksi');
	}

	public function update(Request $request, $id)
    {
        $permintaan_produk = permintaan_produksi::find($id);

        $permintaan_produk->update([
                'status' => 'confirmed'
                ]);
      

				Session::flash('create_success','Data telah diubah!');

				return back();
				
   
		return redirect('/permintaan_produksi');
    }

		
       
    

	public function destroy($id)
    {
       
	
    }
 
}
