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

//Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/welcome/{id}', 'HomeController@welcome')->name('welcome');
Route::match(['get', 'post'], 'logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


Route::get('/enterData', 'EnterDataController@index')->name('enterData');
Route::get('/analysis', 'AnalysisController@index')->name('analysis');
Route::get('/admin', 'AdminController@index')->name('admin');


Route::group(['prefix'=>'customers', 'middleware' => ['super.admin.login', 'menu.customers']], function () {
    Route::match(['get', 'post'], '/', 'CustomersController@index')->name('customers.index');
    Route::get('/create', 'CustomersController@create')->name('customers.create');
    Route::post('/store', 'CustomersController@store')->name('customers.store');
    Route::get('/view/{id}', 'CustomersController@view')->name('customers.view');
    Route::get('/edit/{id}', 'CustomersController@edit')->name('customers.edit');
    Route::post('/update/{id}', 'CustomersController@update')->name('customers.update');
    Route::get('/delete/{id}', 'CustomersController@delete')->name('customers.delete');
});


# admin/
Route::group(['prefix'=>'admin', 'middleware' => ['menu.admin']], function () {

    Route::get('/', function () {
        return redirect()->route('admin.cities.index');
    });

    # admin/cities/
    Route::group(['prefix'=>'cities'], function () {
        Route::match(['get', 'post'], '/', 'Admin\CitiesController@index')->name('admin.cities.index');
        Route::get('/create', 'Admin\CitiesController@create')->name('admin.cities.create');
        Route::post('/store', 'Admin\CitiesController@store')->name('admin.cities.store');
        Route::get('/view/{id}', 'Admin\CitiesController@view')->name('admin.cities.view');
        Route::get('/edit/{id}', 'Admin\CitiesController@edit')->name('admin.cities.edit');
        Route::post('/update/{id}', 'Admin\CitiesController@update')->name('admin.cities.update');
        Route::get('/delete/{id}', 'Admin\CitiesController@delete')->name('admin.cities.delete');
    });



});