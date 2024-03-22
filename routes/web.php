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

Route::get('/', function () {
    return view('home');
});

Route::get('/shop-all', function (){
    return view('shop-all');
});

Route::get('/plants', function (){
    return view('plant');
});

Route::get('/occasions', function (){
    return view('occasion');
});

Route::get('/flowers', function (){
    return view('flowers');
});

Route::get('/about-us', function (){
    return view('about-us');
});

