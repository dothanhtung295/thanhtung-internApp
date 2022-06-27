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
use Illuminate\Support\Facades\Route;
Route::get('/', "mycontroller@index");
Route::get('/add-product','mycontroller@viewAddProduct');
Route::post('/addProduct','mycontroller@postAddProduct');
Route::get('/detail-product/{id}','mycontroller@detailProduct');
Route::get('/edit-product/{id}','mycontroller@editProduct');
Route::get('/delete-product/{id}','mycontroller@deleteProduct');

