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
Auth::routes();


Route::get('/', 'AdminController@index');
Route::get('/home', 'AdminController@index')->name('home');
Route::resource('/users', 'MasterData\UserController');
Route::resource('/customers','MasterData\CustomerController');
Route::resource('/disty','MasterData\DistyController');
Route::resource('/sizes','MasterData\SizeController');
Route::get('size-delete' , 'MasterData\SizeController@deletesize');
Route::get('sizes-update' , 'MasterData\SizeController@updatesize');

Route::resource('/colors','MasterData\ColorController');
Route::get('color-delete' , 'MasterData\ColorController@deletecolor');
Route::get('color-update' , 'MasterData\ColorController@updatecolor');

Route::resource('/category','MasterData\CategoryController');
Route::get('category-update' , 'MasterData\CategoryController@updatecategory');
Route::get('category-delete' , 'MasterData\CategoryController@deletecategory');

Route::resource('/items','MasterData\ItemsController');
Route::resource('/offers','MasterData\OfferController');
Route::get('items/get/{id}','MasterData\OfferController@getitembycat');

Route::resource('/invoices','MasterData\InvoiceController');
Route::get('itemycat/get/{id}','MasterData\InvoiceController@getitem');
Route::get('/itemvalues/get/{id}','MasterData\InvoiceController@getitemvalues');
Route::get('/itemvalues/get/{id}','MasterData\InvoiceController@getitemvalues');
Route::get('/offers/get/{id}', 'MasterData\InvoiceController@getoffers');
Route::get('/offerdiscount/get/{offerId}/{itemid}', 'MasterData\InvoiceController@getofferdiscount');
Route::get('/colors/get/{id}', 'MasterData\InvoiceController@getitemcolor');
Route::get('/sizes/get/{id}', 'MasterData\InvoiceController@getitemsize');
