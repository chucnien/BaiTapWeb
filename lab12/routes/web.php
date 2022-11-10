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

// Route::get('/', function () {
//     return view('layout');
// });

Route::get('/','App\Http\Controllers\HomeController@index');

Route::get('trang-chu','App\Http\Controllers\HomeController@index');

Route::get('home','HomeController@index');

Route::get('trangchu', [HomeController::class, 'index']);

// backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_drashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::post('/save-category-product','CategoryProduct@save_category_product');
