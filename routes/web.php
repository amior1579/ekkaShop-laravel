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
Route::get('/admin_dashboard/users_profile', [AdminDashboardController::class,'users_profile']);
//Route::get('/admin_dashboard/users_profile/{user_id}', [AdminDashboardController::class,'users_profile']);
Route::post('/admin_dashboard/users_profile/userUpdate/{user_id}', [AdminDashboardController::class,'userUpdate']);



Route::post('user_register',[AuthController::class,'user_register']);
Route::post('user_login',[AuthController::class,'user_login']);
Route::get('user_delete/{user_id}',[AuthController::class,'user_delete']);
