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
Route::get('/', function () {
    return view('index');
});

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/contact',  function () {
    return view('contact');
});

Route::get('/privacy',  function () {
    return view('privacy');
});

Route::get('/service',  function () {
    return view('service');
});

Route::get('/arrange-data/top',  function () {
    return view('/arrange-data/top');
});

Route::get('/problem/openout', 'OpenOutController@index');
Route::post('/problem/openout', 'OpenOutController@create');
// Route::resource('/problem/openout', 'OpenOutController', ['only' => ['create', 'store']]);

Route::get('/problem/masterout',  function () {
    return view('/problem/masterout');
});

Route::get('/problem/perfect',  function () {
    return view('/problem/perfect');
});

Auth::routes();


Route::get('/user/profile', 'OpenOutController@profile');
Route::post('/user/profile', 'OpenOutController@profile');
Route::get('/home', 'HomeController@index')->name('home');
