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

    # admin/categories/
    Route::group(['prefix'=>'categories'], function () {
        Route::get('/', 'Admin\CategoriesController@index')->name('admin.categories.index');
        Route::get('/create', 'Admin\CategoriesController@create')->name('admin.categories.create');
        Route::post('/store', 'Admin\CategoriesController@store')->name('admin.categories.store');
        Route::get('/view/{id}', 'Admin\CategoriesController@view')->name('admin.categories.view');
        Route::get('/edit/{id}', 'Admin\CategoriesController@edit')->name('admin.categories.edit');
        Route::post('/update/{id}', 'Admin\CategoriesController@update')->name('admin.categories.update');
        Route::get('/delete/{id}', 'Admin\CategoriesController@delete')->name('admin.categories.delete');
    });

    # admin/institutions/
    Route::group(['prefix'=>'institutions'], function () {
        Route::get('/', 'Admin\InstitutionsController@index')->name('admin.institutions.index');
        Route::get('/create', 'Admin\InstitutionsController@create')->name('admin.institutions.create');
        Route::post('/store', 'Admin\InstitutionsController@store')->name('admin.institutions.store');
        Route::get('/view/{id}', 'Admin\InstitutionsController@view')->name('admin.institutions.view');
        Route::get('/edit/{id}', 'Admin\InstitutionsController@edit')->name('admin.institutions.edit');
        Route::post('/update/{id}', 'Admin\InstitutionsController@update')->name('admin.institutions.update');
        Route::get('/delete/{id}', 'Admin\InstitutionsController@delete')->name('admin.institutions.delete');
    });

});