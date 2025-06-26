<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Middleware\Admin;
use App\http\Controllers\MyController;
use App\http\Controllers\CartController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\FrontendController;

// Route::get('/', function () {
//     return view('layouts.frontend');
// });



// Route::get('about', function () {
//     return 'ini halaman about';
// });

// Route::get('profile', function () {
//     return view('profile');
// });

// // route parameter

// Route::get('produk/{namaProduk}', function($p) {
//     return 'Saya Membeli' .$p;
// });

// Route::get('kategori/{namaKategori}', function($kategori) {
//     return view('kategori', compact('$kategori'));

//     // return view('kategori', ['kat' => $kategori]);
//});

// Route::get('search/{keyword?}', function ($key = null) {
//     return view('search', compact('key'));
// });
// Route::get('toko/{barang?}/{kode?}', function ($barang = null, $kode = null){
//     return view('toko' , compact('barang','kode'));
// });


// route::get('buku', [MyController::class, 'index']);

// route::get('buku/create', [MyController::class, 'create']);
// route::post('buku', [MyController::class, 'store']);
// route::get('buku/{id}', [MyController::class, 'show']);
// route::get('buku/{id}/edit', [MyController::class, 'edit']);
// route::put('buku/{id}', [MyController::class, 'update']);
// route::delete('buku/{id}', [MyController::class, 'destroy']);
Auth::routes();


//route guest (tamu)/member
Route::get('/',[FrontendController::class,'index']);
Route::get('product',[FrontendController::class,'product'])->name('product.index');
Route::get('/product/{product}', [FrontendController::class, 'singleProduct'])->name('product.show');
Route::get('/product/category/{slug}', [FrontendController::class, 'filterByCategory'])->name('product.filter');
Route::get('/search', [FrontendController::class, 'search'])->name('product.search');

Route::get('about',[FrontendController::class,'about']);

//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
// orders
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//route admin

Route::group(['prefix'=>'admin', 'as'=> 'backend.', 'middleware'=>['auth', Admin::class]], function(){
    Route::get('/', [BackendController::class, 'index'])->name('dashboard');

    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
});

   