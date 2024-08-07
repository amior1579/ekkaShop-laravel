<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user_register',[AuthController::class,'user_register']);
Route::post('/user_login',[AuthController::class,'user_login']);

Route::get('/admin_dashboard/users_list', [AdminDashboardController::class,'users_list']);
