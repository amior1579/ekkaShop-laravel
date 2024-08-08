<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user_register',[AuthController::class,'user_register']);
Route::post('/user_login',[AuthController::class,'user_login']);
Route::get('/user_delete/{user_id}',[AuthController::class,'user_delete']);


Route::get('/admin_dashboard', function () {return view('dashboard.adminDashboard.layouts.content.index');});
Route::get('/admin_dashboard/users_list', [AdminDashboardController::class,'users_list']);
Route::post('/admin_dashboard/users_list/addUser', [AdminDashboardController::class,'addUser']);
Route::get('/admin_dashboard/users_profile', [AdminDashboardController::class,'users_profile']);
Route::get('/admin_dashboard/users_profile/{user_id}', [AdminDashboardController::class,'users_profile']);
