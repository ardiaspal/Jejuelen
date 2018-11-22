<?php

Route::group(['middleware' => 'auth'], function(){
	Route::resource('user', 'UserController', ['except' => ['index','show']]);
	
	Route::resource('mitra', 'MitraController');

	Route::resource('pesanan', 'PesananController');
	Route::post('/pesanan/kg', 'PesananController@pesananKg');
	Route::post('/pesanan/Lahan', 'PesananController@pesananLahan');
	Route::get('/pesanan/hapus/{id}/{type}/{idProduk}', 'PesananController@pesananHapus');

	Route::resource('petani', 'PetaniController');
	Route::post('/tambah-produk-kg', 'PetaniController@tambahProdukKg');
	Route::get('/produk-edit-kg/{id}', 'PetaniController@editprodukkg');
	Route::put('/data-edit-kg/{id}', 'PetaniController@editdataprodukkg');
	Route::get('/data-delete-kg/{id}/destroy', 'PetaniController@destroyKg');

	Route::post('/tambah-produk-lahan', 'PetaniController@tambahProdukLahan');

	Route::resource('umum', 'UmumController');

	Route::resource('transaksi', 'TransaksiController', ['except' => ['index','show']]);
	Route::get('/pembayaran', 'TransaksiController@pembayaran');
	Route::post('/pembayaran/upload', 'TransaksiController@pembayaranUpload');
	Route::post('/pembayaran/verifikasi/{id}', 'TransaksiController@updatePembayaran');
	Route::get('/History', 'TransaksiController@history');
	Route::get('/transaksi-petani', 'TransaksiController@transaksiPetani');

	// Route::post('/managemen', 'MiminController@managemen');
	// Route::get('/pesanan/{id}/edit', 'MiminController@edit');
	// Route::put('/forumComment/{id}', 'MiminController@update');
	// Route::get('/forumComment/{id}/destroy', 'MiminController@destroy');
	
	
	Route::get('/Setting/{username}', 'HomeController@editProfile');
	Route::put('/Setting/{id}', 'HomeController@updateProfile');

});

Route::get('/', function () {
	return view('welcome2');
});

Route::group(['middleware' => 'mimin'], function(){
	Route::get('/mimin', 'MiminController@dasboard');

	Route::get('/managemen-pasar', 'MiminController@managemenPasar');
	Route::put('/edit-harga-buah/{id}', 'MiminController@editHargaBuah');
	Route::get('/hapus-harga-buah/{id}/destroy', 'MiminController@hapusharga');
	Route::post('/tambah-harga-buah', 'MiminController@tambahHargaBuah');
	Route::get('/statistik-harga-buah/{id}', 'MiminController@statistikharga');
	Route::get('/pembayaran-mimin', 'TransaksiController@pembayaranAdmin');


	Route::get('/daftar-petani', 'MiminController@daftarPetani');
	Route::post('/register-petani', 'MiminController@registerPetani');


	Route::get('/daftar-pembeli', 'MiminController@daftarPembeli');

	Route::get('/daftar-mitra', 'MiminController@daftarMitra');
	

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mitra-validasi', 'HomeController@mitraValidasi');

Route::get('/petani-validasi', 'HomeController@petaniValidasi');
Route::put('/update-petani-validasi/{id}', 'PetaniController@petaniUpdateValidasi');


Route::resource('/user', 'UserController', ['only' => ['index','show']]);

Route::get('/produk', 'ProdukController@produk_jual');
Route::get('/produk-KG/{slug}', 'PetaniController@showprodukKG');
Route::get('/produk-Lahan/{slug}', 'PetaniController@showprodukLahan');
// Route::get('/{username}', 'HomeController@profile');
