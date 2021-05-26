<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ProdutosController@index');
Route::get('/produtos/show/{produto}', 'ProdutosController@show');
Route::get('/produtos', 'ProdutosController@search_produtos');
Route::post('/produtos', 'ProdutosController@store');
Route::patch('/produtos/{produto}', 'ProdutosController@update');
Route::get('/produtos/{produto}', 'ProdutosController@delete');
