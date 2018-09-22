<?php

Route::group(['middleware' => 'auth'], function(){
	Route::resource('user', 'UserController', ['except' => ['index','show']]);
	Route::resource('produk', 'ProdukController', ['except' => ['index','show']]);
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mitra-validasi', 'HomeController@mitraValidasi');


Route::resource('/user', 'UserController', ['only' => ['index','show']]);
Route::resource('/produk', 'ProdukController', ['only' => ['index','show']]);
Route::resource('/transaksi', 'TransaksiController', ['only' => ['index','show']]);


Route::get('/StoryFromTraveler/sftpart/{slug}', 'SftController@show_part');

Route::get('/{username}', 'HomeController@profile');
