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

Route::get('/','LoginController@index');
Route::post('/login', 'LoginController@login');


//Genre
Route::get('/Genre','GenreController@index');

Route::get('/GenreAddPage','GenreController@GenreAddPage');
Route::post('/GenreAdd','GenreController@GenreAdd');

Route::post('/GenreDelete','GenreController@GenreDelete');

Route::post('/GenreEditPage','GenreController@GenreEditPage');

Route::post('/GenreEdit','GenreController@GenreEdit');

Route::post('/GenreSearch','GenreController@GenreSearch');
//End Genre

//Maker
Route::get('/Maker','MakerController@index');

Route::get('/MakerAddPage','MakerController@MakerAddPage');

Route::post('/MakerAdd','MakerController@MakerAdd');

Route::post('/MakerDelete','MakerController@MakerDelete');

Route::post('/MakerEditPage','MakerController@MakerEditPage');

Route::post('/MakerEdit','MakerController@MakerEdit');

Route::post('/MakerSearch','MakerController@MakerSearch');
//End Maker

//Brand
Route::get('/Brand','BrandController@index');

Route::get('/BrandAddPage','BrandController@BrandAddPage');

Route::post('/BrandAdd','BrandController@BrandAdd');

Route::post('/BrandDelete','BrandController@BrandDelete');

Route::post('/BrandEditPage','BrandController@BrandEditPage');

Route::post('/BrandEdit','BrandController@BrandEdit');

Route::post('/BrandSearch','BrandController@BrandSearch');
//End Brand

//Product
Route::get('/Product','ProductController@index');

Route::get('/ProductAddPage','ProductController@ProductAddPage');

Route::get('states/get/{id}', 'ProductController@GetBrand');

Route::post('/ProductAdd','ProductController@ProductAdd');

Route::post('/ProductDelete','ProductController@ProductDelete');

Route::post('/ProductEditPage','ProductController@ProductEditPage');

Route::post('/ProductEdit','ProductController@ProductEdit');

Route::post('/ProductSearch','ProductController@ProductSearch');
 //End Product

//Sale
Route::get('/Sale','SaleController@index');

Route::get('/SaleAddPage','SaleController@SaleAddPage');


Route::post('/SaleAdd','SaleController@SaleAdd');

Route::post('/SaleDelete','SaleController@SaleDelete');

Route::post('/SaleEditPage','SaleController@SaleEditPage');

Route::post('/SaleEdit','SaleController@SaleEdit');

Route::post('/SaleSearch','SaleController@SaleSearch');
//End Sale

//SaleOperation
Route::get('/SaleOperation','SaleOperationController@index');

Route::post('/SaleInsert','SaleOperationController@SaleInsert');

Route::post('/SaleOperationDelete','SaleOperationController@SaleOperationDelete');

Route::post('/SaleOperationDeleteTwo','SaleOperationController@SaleOperationDeleteTwo');

Route::post('/SaleOperationSearch', 'SaleOperationController@SaleOperationSearch');
//End SaleOperation