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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**********************
 * 
 * INIT BCP
 * 
 *********************/
Route::get('/{id}-init',[
    'uses' => 'BaseController@init',
    'as' => 'init'
]);

/**************
 * 
 * CLIENT DEBT
 * 
 **************/
Route::post('/debt-save', [

    'uses' => 'ClientController@addDebt',
    'as' => 'add-debt'
]);

/************************
 * 
 * Assistant Send goods
 * 
 ***********************/
Route::post('/send-goods',[
    'uses' => 'AssistantController@sendGoods',
    'as' => 'send-goods'
]);

/****************
 * 
 *  POS
 * 
 **************/
Route::post('/pos-cart',[

    'uses' => 'PosController@shoppingCart',
    'as' => 'shopping-cart'
]);

Route::get('/view-receipt-{id}',[
    'uses' => 'PosController@viewReceipt',
    'as' => 'view-receipt'
]);

Route::get('/print-receipt',[
    'uses' => 'PosController@printReceipt',
    'as' => 'print-receipt'
]);