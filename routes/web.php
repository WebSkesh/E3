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

Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();



Route::group(['prefix'=>'customers', 'middleware' => ['SuperAdminLogin']], function () {
    Route::match(['get', 'post'], '/', 'CustomersController@index')->name('customers.index');
    Route::get('/create', 'CustomersController@create')->name('customers.create');
    Route::post('/store', 'CustomersController@store')->name('customers.store');
    Route::get('/view/{id}', 'CustomersController@view')->name('customers.view');
    Route::get('/edit/{id}', 'CustomersController@edit')->name('customers.edit');
    Route::post('/update/{id}', 'CustomersController@update')->name('customers.update');
    Route::get('/delete/{id}', 'CustomersController@delete')->name('customers.delete');
});
