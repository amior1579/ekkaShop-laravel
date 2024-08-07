<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ------- View -------
Route::get('/', function () {return view('shop.layouts.content.index');})->name('home');

Route::get('/register', function () {return view('shop.layouts.content.register');});
Route::get('/login', function () {return view('shop.layouts.content.login');});

Route::get('/admin_dashboard', function () {
    return view('dashboard.adminDashboard.layouts.content.index');
});


Route::post('user_register',[AuthController::class,'user_register']);
Route::post('user_login',[AuthController::class,'user_login']);
