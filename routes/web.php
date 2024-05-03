<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/form', [TaskController::class, 'index'])->name('form');

Route::get('/register', [AccountController::Class, 'register'])->name('register');

Route::post('/register', [AccountController::class, 'registerPost'])->name('register.post');

Route::get('/login', [AccountController::Class, 'login'])->name('login');

Route::post('/login', [AccountController::Class, 'postLogin'])->name('login.post');

Route::post('/logout', [AccountController::class, 'logout'])->name('logout');

//Admin v

Route::middleware(['role:admin,employee'])->group(function () {
    
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

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

    Route::get('/admin/product/details/{id}', [ProductController::class, 'show'])->name('product.details');

    Route::get('/admin/users/list', [UserController::class, 'index'])->name('users.list');

    Route::get('/users/getall', [UserController::class, 'getAll'])->name('users.getall');

    Route::get('/admin/users/details/{id}', [UserController::class, 'show'])->name('users.show');

    Route::get('/admin/orders/list', [OrderController::class, 'list'])->name('orders.list');

    Route::get('/admin/order/{id}', [OrderController::class, 'details'])->name('order.details');

    Route::get('/admin/order/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
    
    Route::post('/admin/order/edit/{id}', [OrderController::class, 'update'])->name('order.update');

    Route::post('/admin/order/status/update/{id}', [OrderController::class, 'orderStatusUpdate'])->name('status.update');
    
    Route::post('/admin/order/payment/status/update/{id}', [OrderController::class, 'paymentStatusUpdate'])->name('payment.update');

    
});

Route::middleware(['role:admin'])->group(function () {

    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');

    Route::post('/admin/users/create', [UserController::class, 'store'])->name('users.store');

    Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

    Route::post('/admin/users/edit/{id}', [UserController::class, 'update'])->name('users.update');

    Route::post('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


});

Route::middleware(['role:user'])->group(function () {

    Route::get('/autocomplete', [HomeController::class, 'autocomplete'])->name('product.autocomplete');

    Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.show');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::post('/cart/{productId}/edit', [CartController::class, 'edit'])->name('cart.edit');

    Route::post('/user/cart', [CartController::class, 'store'])->name('cart.store');

    Route::post('/cart/update/{productId}', [CartController::class, 'update'])->name('cart.update');

    Route::post('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/order/{id}', [OrderController::class, 'create'])->name('order.create');

    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

    Route::get('/order/{id}/list', [OrderController::class, 'index'])->name('order.list');

    Route::get('/order/details/{id}', [OrderController::class, 'show'])->name('order.show');

    Route::get('/order/details/{id}/invoice', [OrderController::class, 'invoice'])->name('order.invoice');

    Route::post('/order/details/{id}', [OrderController::class, 'cancel'])->name('order.cancel');

    Route::post('/address/store', [AddressController::class, 'store'])->name('address.store');

    Route::post('/address/{id}', [AddressController::class, 'update'])->name('address.update');
    
    Route::post('/addresses/{id}/delete', [AddressController::class, 'destroy'])->name('address.destroy');
    
    Route::get('/order/{userId}/list/address', [AddressController::class, 'index'])->name('address.list');
    
    Route::post('/billing/store', [BillingController::class, 'store'])->name('billing.store');
    
    Route::post('/billing/{id}', [BillingController::class, 'update'])->name('billing.update');
    
    Route::post('/billing/{id}/delete', [BillingController::class, 'destroy'])->name('billing.destroy');
    
    Route::get('/order/{userId}/list/billing', [BillingController::class, 'index'])->name('billing.list');

    Route::post('/card/store', [CardController::class, 'store'])->name('card.store');
    
    Route::post('/card/{id}', [CardController::class, 'update'])->name('card.update');

    Route::post('/card/{id}/delete', [CardController::class, 'destroy'])->name('card.destroy');

    Route::get('/order/{userId}/list/card', [CardController::class, 'index'])->name('card.list');
    
    Route::get('/order/{userId}/list/profile', [ProfileController::class, 'show'])->name('profile.show');

    Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/thankyou', [OrderController::class, 'thanks'])->name('order.thanku');

    Route::get('/shop-all', [ShopAllController::class, 'index'])->name('shop-all');

    Route::get('/flowers/{id}', [ShopAllController::class, 'flowers'])->name('flowers');

    Route::get('/occasions/{id}', [ShopAllController::class, 'occasions'])->name('occasions');


    Route::get('/about-us', function () {
        return view('User/about-us');
    })->name('about-us');
});

Route::get('/admin/accessdenied', function () {
    return view('/admin/accessdenied');
});


Route::get('/task', [TaskController::class, 'index'])->name('task');




