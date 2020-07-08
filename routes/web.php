<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// トップページ
Route::get('/', function () {
    return view('index');
});


// アレンジデータ

Route::get('/arrange-data/top', 'ArrangeController@index');
Route::get('/arrange-data/openout_data', 'ArrangeOpenController@index');
Route::get('/arrange-data/masterout_data', 'ArrangeMasterController@index');
Route::get('/arrange-data/perfect_data', 'ArrangePerfectController@index');


// オープンアウト
Route::get('/openout', 'OpenOutController@index');
Route::post('/openout', 'OpenOutController@create');
Route::get('/openout/show/{id}', 'OpenOutController@show');
Route::get('/openout/edit/{id}', 'OpenOutController@edit');
Route::post('/openout/update/{id}', 'OpenOutController@update');
Route::post('/openout/destroy/{id}', 'OpenOutController@destroy');

// マスターアウト
Route::get('/masterout', 'MasterOutController@index');
Route::post('/masterout', 'MasterOutController@create');
Route::get('/masterout/show/{id}', 'MasterOutController@show');
Route::get('/masterout/edit/{id}', 'MasterOutController@edit');
Route::post('/masterout/update/{id}', 'MasterOutController@update');
Route::post('/masterout/destroy/{id}', 'MasterOutController@destroy');

// パーフェクトモード
Route::get('/perfect', 'PerfectController@index');
Route::post('/perfect', 'PerfectController@create');
Route::get('/perfect/show/{id}', 'PerfectController@show');
Route::get('/perfect/edit/{id}', 'PerfectController@edit');
Route::post('/perfect/update/{id}', 'PerfectController@update');
Route::post('/perfect/destroy/{id}', 'PerfectController@destroy');


// ログイン
Auth::routes();


Route::get('/auth/rating', 'Auth\RegisterRatingController@index');
Route::post('/auth/rating/{id}', 'Auth\RegisterRatingController@update');

// プロフィール系
Route::get('/user/profile', 'OpenOutController@profile');
Route::post('/user/profile', 'OpenOutController@profile');
Route::get('/home', 'HomeController@index')->name('home');


// 各種ページ
Route::get('/contact',  function () {
    return view('contact');
});

Route::get('/privacy',  function () {
    return view('privacy');
});

Route::get('/service',  function () {
    return view('service');
});


Route::get('/login/{social}', 'Auth\OAuthLoginController@socialLogin')->where('social', 'twitter');
Route::get('/login/{social}/callback', 'Auth\OAuthLoginController@handleProviderCallback')->where('social', 'twitter');