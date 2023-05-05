<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Permintaan_produk;
use App\Data_produk;

use Session;
use App\Imports\permintaanImport;
use App\Produk_keluar;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class permintaan_produkController extends Controller
{
public function index()
{
$permintaan_produk = Permintaan_produk::paginate(10);
return view('permintaan_produk.index',['permintaan_produk'=>$permintaan_produk]);
}


public function import_excel(Request $request) 
{
// validasi
$this->validate($request, [
'file' => 'required|mimes:csv,xls,xlsx',

]);

// menangkap file excel
$file = $request->file('file');

// membuat nama file unik
$nama_file = rand().$file->getClientOriginalName();

// upload ke folder file permintaan produk di dalam folder public
$file->move('file_permintaan',$nama_file);

// import data
Excel::import(new permintaanImport, public_path('/file_permintaan/'.$nama_file));

// notifikasi dengan session
Session::flash('sukses','Data Permintaan produk Berhasil Diimport!');

// alihkan halaman kembali

$permintaan = Permintaan_produk::pluck('order_no')->toArray();
if(Data_produk::count() > 0){
$data = Data_produk::pluck('order_no')->toArray();
}else{
$data = [];
}
$diff_permintaan = array_diff($permintaan, $data);
foreach ($diff_permintaan as $perm){
$permintaan_produk = Permintaan_produk::where('order_no', $perm)->first();
Data_produk::create([
'order_no' => $permintaan_produk->order_no,
'part_no' => $permintaan_produk->part_no,
'part_name' => $permintaan_produk->part_name,
'customer' => $permintaan_produk->customer

]);
}
return redirect('/permintaan_produk');
}

public function store(Request $request)
{
$request->validate([
'title'       => 'required|max:255',
'description' => 'required',
]);

$post = Post::updateOrCreate(['id' => $request->id], [
		'title' => $request->title,
		'description' => $request->description
	]);

return response()->json(['code'=>200, 'message'=>'Post Created successfully','data' => $post], 200);

}

}