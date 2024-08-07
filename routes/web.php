<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ------- shop View -------
Route::get('/', function () {return view('shop.layouts.content.index');})->name('home');
Route::get('/register', function () {return view('shop.layouts.content.register');});
Route::get('/login', function () {return view('shop.layouts.content.login');});


// ------- admin dashboard View -------
Route::get('/admin_dashboard', function () {return view('dashboard.adminDashboard.layouts.content.index');});
Route::get('/admin_dashboard/users_list', [AdminDashboardController::class,'users_list']);
Route::post('/admin_dashboard/users_list/addUser', [AdminDashboardController::class,'addUser']);



Route::post('user_register',[AuthController::class,'user_register']);
Route::post('user_login',[AuthController::class,'user_login']);
