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
Route::redirect('/', '/home');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => '/produtos', 'middleware' => 'auth'], function() {
    Route::get('/', 'ProdutoController@lista');
    Route::get('/json', 'ProdutoController@listaJson');
    Route::get('/mostra/{id?}', 'ProdutoController@mostra')->where('id', '[0-9]+');
    Route::get('/novo', 'ProdutoController@novo');
    Route::get('/altera/{id}', 'ProdutoController@altera');
    Route::post('/adiciona', 'ProdutoController@adiciona');
    Route::post('/update', 'ProdutoController@update');
    Route::get('/remove/{id}', 'ProdutoController@remove');
});

