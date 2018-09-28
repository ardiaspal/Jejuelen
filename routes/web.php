<?php

Route::group(['middleware' => 'auth'], function(){
	Route::resource('user', 'UserController', ['except' => ['index','show']]);
	
	Route::resource('mitra', 'MitraController');
	Route::resource('petani', 'PetaniController');
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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mitra-validasi', 'HomeController@mitraValidasi');


Route::resource('/user', 'UserController', ['only' => ['index','show']]);

// Route::get('/{username}', 'HomeController@profile');
