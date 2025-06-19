<?php

use Illuminate\Support\Facades\Route;


use App\http\Controllers\MyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return 'ini halaman about';
});

Route::get('profile', function () {
    return view('profile');
});

// route parameter

Route::get('produk/{namaProduk}', function($p) {
    return 'Saya Membeli' .$p;
});

Route::get('kategori/{namaKategori}', function($kategori) {
    return view('kategori', compact('$kategori'));

    // return view('kategori', ['kat' => $kategori]);
});

Route::get('search/{keyword?}', function ($key = null) {
    return view('search', compact('key'));
});
Route::get('toko/{barang?}/{kode?}', function ($barang = null, $kode = null){
    return view('toko' , compact('barang','kode'));
});


route::get('buku', [MyController::class, 'index']);

route::get('buku/create', [MyController::class, 'create']);
route::post('buku', [MyController::class, 'store']);
route::get('buku/{id}', [MyController::class, 'show']);
route::get('buku/{id}/edit', [MyController::class, 'edit']);
route::put('buku/{id}', [MyController::class, 'update']);
route::delete('buku/{id}', [MyController::class, 'destroy']);