<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [AccountController::Class, 'register'])->name('register');

Route::post('/register', [AccountController::class, 'registerPost'])->name('register.post');

Route::get('/login', [AccountController::Class, 'login'])->name('login');

Route::post('/login', [AccountController::Class, 'postLogin'])->name('login.post');

Route::post('/logout', [AccountController::class, 'logout'])->name('logout');

//Admin v

Route::middleware(['role:admin,employee'])->group(function () {

    Route::get('/admin', function () {
        return view('Admin/dashboard');
    });

    Route::get('/admin/category/list', [CategoryController::class, 'index'])->name('category.list');

    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('category.create');

    Route::post('/admin/category/create', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');

    Route::post('/admin/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');

    Route::post('/admin/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/admin/occasion/create', [OccasionController::class, 'create'])->name('occasion.create');

    Route::post('/admin/occasion/create', [OccasionController::class, 'store'])->name('occasion.store');

    Route::get('/admin/occasion/list', [OccasionController::class, 'index'])->name('occasion.list');

    Route::get('/admin/occasion/edit/{id}', [OccasionController::class, 'edit'])->name('occasion.edit');

    Route::post('/admin/occasion/edit/{id}', [OccasionController::class, 'update'])->name('occasion.update');

    Route::post('/admin/occasion/{id}', [OccasionController::class, 'destroy'])->name('occasion.destroy');

    Route::get('/admin/product/create', [ProductController::class, 'create'])->name('product.create');

    Route::post('/admin/product/create', [ProductController::class, 'store'])->name('product.store')->middleware('web');

    Route::get('/admin/product/list', [ProductController::class, 'index'])->name('product.list');

    Route::post('/admin/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

    Route::post('/admin/product/edit/{id}', [ProductController::class, 'update'])->name('product.update');

    Route::get('/admin/product/details/{id}', [ProductController::class, 'show'])->name('product.show');

    Route::get('/admin/users/list', [UserController::class, 'index'])->name('users.list');

    Route::get('/admin/users/details/{id}', [UserController::class, 'show'])->name('users.show');
});

Route::middleware(['role:admin'])->group(function () {

    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');

    Route::post('/admin/users/create', [UserController::class, 'store'])->name('users.store');

    Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

    Route::post('/admin/users/edit/{id}', [UserController::class, 'update'])->name('users.update');

    Route::post('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


});

Route::middleware(['auth'])->group(function () {

    Route::get('/shop-all', [ShopAllController::class, 'getAll'])->name('shop-all');


    Route::get('/occasions', function () {
        return view('occasion');
    });

    Route::get('/product', function () {
        return view('product');
    });

    Route::get('/flowers', function () {
        return view('flowers');
    });

    Route::get('/about-us', function () {
        return view('User/about-us');
    });
});

Route::get('/admin/accessdenied', function () {
    return view('/admin/accessdenied');
});




