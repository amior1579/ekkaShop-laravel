<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\WebAuthController;
use Illuminate\Support\Facades\Route;

Route::post('/user_login',[WebAuthController::class,'user_login']);
Route::post('/user_register',[WebAuthController::class,'user_register']);
Route::get('/user_delete/{user_id}',[WebAuthController::class,'user_delete']);

// ------- shop View -------
Route::get('/', function () {return view('shop.layouts.content.index');})->name('home');
Route::get('/register', function () {return view('shop.layouts.content.register');});
Route::get('/login', function () {return view('shop.layouts.content.login');});


// ------- admin dashboard View -------
Route::prefix('admin_dashboard')->group(function () {
    Route::get('/', function () {return view('dashboard.adminDashboard.layouts.content.index');});
    Route::get('/users_list', [AdminDashboardController::class, 'users_list']);
    Route::post('/users_list/addUser', [AdminDashboardController::class, 'addUser']);
    Route::get('/users_profile', [AdminDashboardController::class, 'users_profile']);
    //Route::get('/users_profile/{user_id}', [AdminDashboardController::class,'users_profile']);
    Route::post('/users_profile/userUpdate/{user_id}', [AdminDashboardController::class, 'userUpdate']);
});

