<?php

Route::group(['middleware' => 'auth'], function(){
	Route::resource('user', 'UserController', ['except' => ['index','show']]);
	
	Route::resource('mitra', 'MitraController');


	Route::resource('petani', 'PetaniController');
	Route::post('/tambah-produk-kg', 'PetaniController@tambahProdukKg');

	Route::resource('umum', 'UmumController');

	Route::resource('transaksi', 'TransaksiController', ['except' => ['index','show']]);
	Route::resource('place', 'PlaceController', ['except' => ['index','show']]);
	Route::resource('history', 'HistoryController', ['except' => ['index','show']]);

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


	Route::get('/daftar-petani', 'MiminController@daftarPetani');
	Route::post('/register-petani', 'MiminController@registerPetani');


	Route::get('/daftar-pembeli', 'MiminController@daftarPembeli');

	Route::get('/daftar-mitra', 'MiminController@daftarMitra');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mitra-validasi', 'HomeController@mitraValidasi');


Route::resource('/user', 'UserController', ['only' => ['index','show']]);

// Route::get('/{username}', 'HomeController@profile');
