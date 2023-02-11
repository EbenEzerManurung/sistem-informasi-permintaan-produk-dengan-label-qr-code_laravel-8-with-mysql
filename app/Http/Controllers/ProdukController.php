<?php
namespace App\Http;

use App\produk_masuk;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function index()
    {
        

        $produk = produk_masuk::all();
        return view('produk/index', compact('produk'));
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

        $this->validate($request , [
            'part_no'          => 'required|string',
            'part_name'         => 'required',
            'qty'           => 'required',
            'customer'         => 'required'
            
        ]);

      

        return response()->json([
            'success' => true,
            'message' => 'Data Produk Created'
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
       
        $produk = produk_masuk::find($id);
        return $produk;
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
        $this->validate($request , [
            'part_no'          => 'required|string',
            'part_name'         => 'required',
            'qty'           => 'required',
            'customer'           => 'required'
            
        ]);

     
        $produk = produk_masuk::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Produk Update'
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
        $produk = produk_masuk::findOrFail($id);
     produk_masuk::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Produk Deleted'
        ]);
    
       
        }

        public function deleteSelected(Request $request)
    {
        foreach ($request->id_dataproduk as $id) {
            $produk = Data_produk::find($id);
            $produk->delete();
        }

        return response(null, 204);
    }

       

    public function indexProduk(){
        $produk = produk_masuk::all();

        return Datatables::of($produk)
        ->addColumn('action', function($produk){
            return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> ' .
                '<a onclick="editForm('. $produk->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                '<a onclick="deleteData('. $produk->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        })
        ->make(true);   
            
    }

}
