<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*****************
 * 
 * Category API
 * 
 ***************/
Route::get('category/{userId}', 'CategoryController@index');
Route::get('category/{userId}/{categoryId}', 'CategoryController@show');
Route::post('category/new', 'CategoryController@save');
Route::post('category/update', 'CategoryController@update');
Route::delete('category/{userId}/{categoryId}', 'CategoryController@delete');
/*****************
 * 
 * Articles API
 * 
 ***************/
Route::get('article/{userId}', 'ArticleController@index');
Route::get('article/{userId}/{articleId}', 'ArticleController@show');
Route::post('article/new', 'ArticleController@save');
Route::post('article/update', 'ArticleController@update');
Route::delete('article/{userId}/{articleId}', 'ArticleController@delete');
/******************************
 * 
 * Get Articles by Category
 * 
 *****************************/
Route::get('catarticle/{userId}/{catId}', 'ArticleController@catArticle');
/**********************
 * 
 * Search articles
 * 
 ********************/
Route::get('search/article/{userId}/{keyword}', 'ArticleController@searchArticle');
/********************
 * 
 * Clients API
 * 
 ******************/
Route::get('client/{userId}', 'ClientController@index');
Route::get('client/{userId}/{clientId}', 'ClientController@show');
Route::post('client/new', 'ClientController@save');
Route::post('client/update', 'ClientController@update');
Route::delete('client/{userId}/{clientId}', 'ClientController@delete');
/*****************
 * 
 * Suppliers API
 * 
 *****************/
Route::get('supplier/{userId}', 'SupplierController@index');
Route::get('supplier/{userId}/{supplierId}', 'SupplierController@show');
Route::post('supplier/new', 'SupplierController@save');
Route::post('supplier/update', 'SupplierController@update');
Route::delete('supplier/{userId}/{supplierId}', 'SupplierController@delete');
/*************************
 * 
 * Client debts API
 * 
 **********************/
Route::get('debt/{userId}', 'ClientController@getClientsDebt');
Route::get('debt/{userId}/{clientId}', 'ClientController@getClientsDebtSingle');