<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Permintaan_produk;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use DataTables;
  

class ChartController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function index()
    {
        $permintaan_produks = Permintaan_produk::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('date', date('Y'))
                    ->groupBy(\DB::raw("Month(date)"))
                    ->pluck('count');
          
        return view('chart', compact('permintaan_produks'));
    }
}
