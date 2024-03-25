<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop-all', [ShopAllController::class, 'getAll'])->name('shop-all');

Route::get('/product', function (){
    return view('product');
});

Route::get('/plants', [PlantsController::class, 'getAll'])->name('plants');

Route::get('/occasions', function (){
    return view('occasion');
});

Route::get('/flowers', function (){
    return view('flowers');
});

Route::get('/about-us', function (){
    return view('about-us');
});




