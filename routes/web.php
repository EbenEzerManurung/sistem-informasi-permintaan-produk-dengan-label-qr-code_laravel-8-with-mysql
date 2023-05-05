<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\{

	
    UserController,


};
use Illuminate\Support\Facades\Route; 

Auth::routes();
  
	
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//permintaan produk
Route::get('/permintaan-tambah', 'Permintaan_produksiNew@home');
Route::get('/permintaan-produksi', 'Permintaan_produksiNew@permintaanproduksi');

//permintaan produk
Route::get('/permintaan-index', 'Permintaan_produksiNew@viewproduk_masuk');

Route::post('/permintaan-store', 'Permintaan_produksiNew@store');
Route::patch('/permintaan-update/{id}', 'Permintaan_produksiNew@update');
Route::patch('/permintaan_produksi-update/{id}', 'Permintaan_produksiController@update');
Route::patch('/produk_masuk-update/{id}', 'produk_masukController@update');
//

 Route::get('/', 'AuthManageController@viewLogin')->name('login');
 Route::get('/login', 'AuthManageController@viewLogin')->name('login');
 Route::post('/verify_login', 'AuthManageController@verifyLogin');
 Route::post('/first_account', 'UserManageController@firstAccount');

Route::group(['middleware' => ['auth', 'checkRole:admin,produksi,ppic,warehousefg']], function(){
	Route::get('/logout', 'AuthManageController@logoutProcess');
	Route::get('/dashboard', 'ViewManageController@viewDashboard');
	// ------------------------- Fitur Cari -------------------------
	//  Route::get('/search/{word}', 'SearchManageController@searchPage');
	// ------------------------- Profil -------------------------
	Route::get('/profile', 'UserManageController@viewAccount');
	Route::post('/profile/update/data', 'ProfileManageController@changeData');
	Route::post('/profile/update/password', 'ProfileManageController@changePassword');
	Route::post('/profile/update/picture', 'ProfileManageController@changePicture');
	// ------------------------- Kelola Akun -------------------------
	// > Akun
	Route::get('/account', 'UserManageController@viewAccount');
	Route::get('/account/new', 'UserManageController@viewNewAccount');
	Route::post('/account/create', 'UserManageController@createAccount');
	Route::get('/account/edit/{id}', 'UserManageController@editAccount');
	Route::post('/account/update', 'UserManageController@updateAccount');
	Route::get('/account/delete/{id}', 'UserManageController@deleteAccount');
	Route::get('/account/filter/{id}', 'UserManageController@filterTable');
	// > Akses
	Route::get('/access', 'AccessManageController@viewAccess');
	Route::get('/access/change/{user}/{access}', 'AccessManageController@changeAccess');
	Route::get('/access/check/{user}', 'AccessManageController@checkAccess');
	Route::get('/access/sidebar', 'AccessManageController@sidebarRefresh');
	// -------------------------  -------------------------
	
     //chart
     Route::resource('chart', ChartController::class);

//route permintaan produk
   Route::get('/permintaan_produk', 'permintaan_produkController@index' );
   Route::get('/permintaan_produksi', 'Permintaan_produksiController@index' );

   
   Route::post('/permintaan/import_excel', 'permintaan_produkController@import_excel');
   Route::patch('/permintaan_produksi-update/{id}', 'Permintaan_produksiController@update');

});
                //data_produk
	// Route::resource('data_produk','Data_produkController')->except(['show','update']);
                 Route::resource('data_produk', Data_produkController::class);
          
			
	//produk_masuk

//  Route::resource('produk_masuk', Produk_masukController::class);
	// Route::resource('produk_masuk', Produk_masukController::class);
	Route::resource('produkmasuk', ProdukmasukController::class);
	Route::get('/tambah_produk', 'ProdukmasukController@tambah');


	// Route::get('/produk_masuk', 'ProdukmasukController@home');
// 	   Route::get('/produk_masuk/update/{id}',[Produk_masukController::class,'patch']);
// 		   Route::patch('/produk_masuk/update/{id}',[Produk_masukController::class,'patch']);
//                  Route::get('produk_masuk/show/{id_produkmasuk}',[Produk_masukControllerr::class,'show']);
//                  Route::get('/produk_masuk/update/{id_produkmasuk}',[Produk_masukController::class,'update']);

//                  Route::post('/produk_masuk/delete-selected', [ProdukController::class, 'deleteSelectedMasuk'])->name('produk.delete_selected');
//                  //validasi
                 Route::resource('validasi', ValidasiController::class);

                 //mencetak label qrcode
                // Route::resource('cetak_label', CetakQrController::class);
				Route::resource('cetak_label', pdfController::class);
				// Route::resource('cetak_label','CetakQrController');
		//    Route::post('/cetak_labelpdf/{id_produkkeluar}','CetakQrController@exportcetaklabel')->name('cetakPDF.labelpdf');
		   Route::get('cetak_labelpdf', 'CetakQrController@exportcetaklabel')->name('cetakPDF.labelpdf');
		   Route::get('/cetak_all', 'pdfController@generatePdf')->name('cetak_labelAll.all');
		   Route::get('/print/{id}', "pdfController@generatePdfOne")->name('cetak_label.one');
		//    Route::get('/exportProductMasuk/{product_id}','ProductMasukController@exportProductMasuk')->name('exportPDF.productMasuk');
		
		   //   Route::post('/cetak_labelpdf', [CetakQrController::class, 'exportcetaklabel'])->name('cetakPDF.labelpdf');

		//   Route::group( function () {
		// 	Route::get('/print', 'Commodities\PdfController@generatePdf')->name('print');
		// 	Route::get('/cetak_labelpdf/{id}','CetakQrController@exportcetaklabel')->name('cetakPDF.labelpdf');
		// });

		  //produk_keluar
		  Route::resource('produk_keluar', ProdukkeluarController::class);
		  Route::get('/produk_keluarAll','ProdukkeluarController@exportprodukkeluarAll')->name('exportPDF.produkkeluarAll');

        // Route::resource('produk_keluar', Produk_keluarController::class);
		//  Route::get('/produk_keluarAll','Produk_keluarController@exportprodukkeluarAll')->name('exportPDF.produkkeluarAll');