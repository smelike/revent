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
    return view('welcome');
});


Route::get('home', function () {
    return view('home.index');
});


Auth::routes();


Route::get('back', 'BackController@index')->name('backend');
//Route::resource('company', 'CompanyController');

// -- Company -- //
Route::get('company', 'CompanyController@index');
Route::post('company', 'CompanyController@store');
Route::get('company/create', 'CompanyController@create');
Route::get('company/{id}', 'CompanyController@show');
Route::get('company/{id}/edit', 'CompanyController@edit');
Route::post('company/{id}/update', 'CompanyController@update');
Route::get('company/{id}/del', 'CompanyController@del');


// -- Product -- //
Route::get('product', 'ProductController@index');
Route::post('product', 'ProductController@store');
Route::get('product/{id}/del', 'ProductController@del');

// -- Strategy -- //
Route::get('strategy', 'StrategyController@index');
Route::post('strategy', 'StrategyController@store');
Route::get('strategy/{id}/del', 'StrategyController@del');


// -- Connect -- //
Route::get('connect', 'ConnectController@index');
Route::get('connect/add', 'ConnectController@addConnect');
Route::post('connect', 'ConnectController@create');


Route::get('test', 'TypeController@test');
Route::get('/home', 'HomeController@index');
