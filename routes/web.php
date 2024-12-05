<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\registerContoller;
use App\Http\Controllers\dashboardContoller;
use App\Http\Controllers\wishlistController;

// Route::get('/', function () {
//     return view('homepage.layouts.home');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [dashboardContoller::class, 'dashboardView']);
});

Route::get('/register', [registerContoller::class, 'registerView']);

Route::post('/proccessregister', [registerContoller::class, 'proccessRegister']);

route::get('/login','App\Http\Controllers\LoginController@login')->name('login');

route::post('/prosesLogin','App\Http\Controllers\LoginController@prosesLogin')->name('prosesLogin');

route::post('/logout','App\Http\Controllers\LoginController@logout');

Route::resource('Stock','App\Http\Controllers\StockBarangController')->middleware('auth');

Route::resource('kategori','App\Http\Controllers\kategoriController')->middleware('auth');

Route::resource('kategori','App\Http\Controllers\kategoriController')->middleware('auth');

Route::resource('/', 'App\Http\Controllers\EcomeController');

Route::get('/ecom/kategori/{id}', 'App\Http\Controllers\EcomeController@kategori');

Route::get('/detail/{id}', 'App\Http\Controllers\EcomeController@show');

// route::resource('/produk','App\Http\Controllers\EcomeController');

route::get('/shop','App\Http\Controllers\EcomeController@shop');

Route::get('/shop?sort_by={sort_by}', 'App\Http\Controllers\EcomeController@shop')->name('products.index.sorted');

route::get('/about','App\Http\Controllers\EcomeController@about');

route::get('/contacts','App\Http\Controllers\EcomeController@contacts');

route::get('/help-faq','App\Http\Controllers\EcomeController@helpFaq');

route::get('/cart','App\Http\Controllers\ShopCartController@keranjang')->middleware('auth');

route::get('/proseskeranjang/{id}','App\Http\Controllers\ShopCartController@shopcartitem')->middleware('auth');

Route::get('checkout',  'App\Http\Controllers\ChekOutController@checkout')->name('checkout')->middleware('auth');

Route::get('checkout-complete',  'App\Http\Controllers\ChekOutController@checkoutComplete')->middleware('auth');

Route::post('/prosescheckout', 'App\Http\Controllers\ChekOutController@prosescheckout');

route::delete('deletecart/{id}','App\Http\Controllers\ShopCartController@deletecart');

route::post('/update-jumlah/{id}','App\Http\Controllers\ShopCartController@updatecart')->name('update.jumlah')->middleware('auth');

route::resource('customer','App\Http\Controllers\customerController');

route::resource('Penjualan','App\Http\Controllers\PenjualanController');

route::delete('penjualanDeleteProduct/{id}','App\Http\Controllers\PenjualanController@deleteProduct');

Route::post('verify-Penjualan/{nobukti}','App\Http\Controllers\PenjualanController@verify')->name('verify')->middleware('auth');

route::resource('Pembelian','App\Http\Controllers\PembelianController');

Route::get('resetpem','App\Http\Controllers\PembelianController@resetNobukti');

route::get('profil/{id}','App\Http\Controllers\profilController@index')->name('profil.show');

route::get('address/','App\Http\Controllers\profilController@address');

route::get('order/','App\Http\Controllers\profilController@order');

route::get('forgot-password-view/','App\Http\Controllers\ForgotPasswordController@showForgotPasswordForm')->name('password.request');

route::post('forgot-password/','App\Http\Controllers\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::resource('wishlist','App\Http\Controllers\wishlistController')->middleware('auth');


Route::post('/wishlist/clear', [WishlistController::class, 'clearWishlist'])->name('wishlist.clear');

Route::resource('staff','App\Http\Controllers\staffController')->middleware('auth');



// Route::middleware('auth')->group(function () {

//     route::post('wishlist/','App\Http\Controllers\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//     // Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
//     // Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
//     // Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
// });





