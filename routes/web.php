<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop-all', [ShopAllController::class, 'getAll'])->name('shop-all');

Route::get('/plants', [PlantsController::class, 'getAll'])->name('plants');

Route::get('/register', [AccountController::Class,'register'])->name('register');

Route::post('/register', [AccountController::class, 'registerPost'])->name('register.post');

Route::get('/login', [AccountController::Class,'login'])->name('login');

Route::post('/login', [AccountController::Class,'loginPost'])->name('login.post');

Route::get('/occasions', function (){
    return view('occasion');
});

Route::get('/product', function (){
    return view('product');
});

Route::get('/flowers', function (){
    return view('flowers');
});

Route::get('/about-us', function (){
    return view('about-us');
});





