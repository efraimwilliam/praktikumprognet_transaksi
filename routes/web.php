<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckOngkirController;



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\LoginControllerAdmin::class, 'loginAdmin'])->name('loginadmin');
Route::post('actionlogin', [App\Http\Controllers\LoginControllerAdmin::class, 'action'])->name('actionlogin');
Route::get('logoutAdmin', [App\Http\Controllers\LoginControllerAdmin::class, 'logoutAdmin'])->name('logoutadmin');


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'indexadmin'])->name ('dashboard');
  Route::get('/homepage', [HomeController::class, 'homepageadmin']); 
  Route::get('/checkout', [HomeController::class, 'checkout']);
  
  Route::post('/waiting/{id}', [HomeController::class, 'waiting']);
  Route::post('/valid/{id}', [HomeController::class, 'valid']);
  Route::post('/expired/{id}', [HomeController::class, 'expired']);
  Route::post('/pengiriman/{id}', [HomeController::class, 'pengiriman']);
  Route::post('/sampaitujuan/{id}', [HomeController::class, 'sampaitujuan']);

  
  Route::resource('kategori', KategoriController::class);
  Route::resource('produk', ProdukController::class);
  Route::resource('courier', CourierController::class);
  Route::resource('detail', DetailController::class);
  Route::get('/comment/{id}', [App\Http\Controllers\ProdukController::class,'comment']);
  Route::post('/produkimagedd/{id}', [App\Http\Controllers\ProdukController::class,'uploadimage']);
  Route::delete('/produkimage/{id}', [App\Http\Controllers\ProdukController::class,'deleteimage']); 
  
  Route::post('/replyreview/{id}/{idbarang}', [App\Http\Controllers\ProdukController::class,'replycomment']);
});

Route::get('/dashboarduser', [HomepageController::class, 'gethomepage']);

Route::get('/detailproduk/{id}', [HomepageController::class, 'detailproduk']);

Route::get('/chart/{id}', [HomepageController::class, 'chartpage']);

Route::delete('/deleteallchart/{id}', [HomepageController::class, 'deletechart']);

Route::post('/addchart/{id}/{idd}', [HomepageController::class, 'addchart']);

Route::get('/checkout/{id}', [HomepageController::class, 'checkout']);

Route::get('/chart/checkout/{id}', [HomepageController::class, 'chartcheckout']);

//checkout dari chart
Route::post('/checkoutgas/{id}', [HomepageController::class, 'checkoutgas']);

//checkout biasa
Route::get('/checkoutbiasa/{id}', [HomepageController::class, 'checkoutbiasa']);

Route::get('/payment/{id}', [HomepageController::class, 'paymentpage']);

Route::post('/uploadpayment/{id}/{idd}', [HomepageController::class, 'uploadpayment']);

Route::delete('/deletecheckout/{id}/{idproduk}', [HomepageController::class, 'deletecheckout']);

Route::post('/uploadcomment/{id}/{idd}', [HomepageController::class, 'uploadcomment']);

Route::post('/balascomment/{id}', [HomepageController::class, 'replycomment']);

Route::post('/uploadcomment23/{id}/{idcekout}', [HomepageController::class, 'uploadreview']);


Route::get('/ongkir',  [CheckOngkirController::class, 'index']);
Route::post('/ongkir', [CheckOngkirController::class, 'check_ongkir']);
Route::get('/cities/{province_id}', [CheckOngkirController::class, 'getCities']);


Auth::routes();
//Auth::routes(['verify' => true]);

//////