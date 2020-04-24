<?php

Route::get('/', function () {
    return view('welcome');
});
//１３章にて編集、追記。
Route::group(['prefix' => 'admin','middleware' => 'auth'],function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');//１３章にて追記
    Route::get('news', 'Admin\NewsController@index');//15章で追記
    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');
    Route::get('news/delete', 'Admin\NewsController@delete');
    
    Route::get('profile/create', 'Admin\ProfileController@add');//課題１２で追加
    Route::post('profile/create','Admin\ProfileController@create');//１３章にて追加
    Route::get('profile/edit', 'Admin\ProfileController@edit');//課題１２で追加
    Route::post('profile/edit', 'Admin\NewsController@update');
    Route::post('profile/update', 'Admin\ProfileController@update');
    
    Route::get('about', 'Admin\AboutController@look');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

