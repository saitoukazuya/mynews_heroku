<?php

Route::get('/', function () {
    return view('welcome');
});
//１３章にて編集、追記した。
Route::group(['prefix' => 'admin','middleware' => 'auth'],function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');//１３章にて追記
});

//09課題　「http://XXXXXX.jp/XXX というアクセスが来たときに、 AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください。
//routes::group(['prefix' => 'XXX'],function() {
    //Route::get('news/bbb', 'Admin\AAAController@bbb');
//});

//【応用】 前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加しました。
//web.phpを編集して、admin/profile/create にアクセスしたら ProfileController の add Action に、
//admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てるように設定してください。

Route::group(['prefix' => 'admin','middleware' => 'auth'],function() {//１３章にて編集
    Route::get('profile/create', 'Admin\ProfileController@add');//課題１２で追加
    Route::post('profile/create','Admin\profileController@create');//１３章にて追加
});
Route::group(['prefix' => 'admin'],function() {
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');//課題１２で追加
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

