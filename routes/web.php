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
use App\category;
Route::get('/', function () {
   return view('welcome');
});




Route::get('/test', function () {

$attributes = ['name' => ' category 1'];
$node = new Category($attributes);
$node->save(); // Saved as root

    //return view('welcome');
});

Route::get('/save','CategoryController@index');
Route::get('/product','CategoryController@product');
