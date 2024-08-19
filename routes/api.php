<?php

use App\Http\Controllers\Dashboard\ApiDashboardController;
use App\Http\Controllers\Auth\ApiAuthController;
use Illuminate\Support\Facades\Route;

Route::post('/user_login',[ApiAuthController::class,'user_login']);
Route::post('/user_register',[ApiAuthController::class,'user_register']);
Route::post('/user_delete/{user_id}',[ApiAuthController::class,'user_delete']);


// ------- dashboard -------
Route::prefix('/dashboard')->group(function () {
//    Route::get('/home', [ApiDashboardController::class, 'home'])->name('dashboard-index');
    Route::get('/users_list', [ApiDashboardController::class, 'users_list']);
    Route::post('/users_list/addUser', [ApiDashboardController::class, 'addUser']);

    Route::get('/users_profile', [ApiDashboardController::class, 'users_profile']);

        //Route::get('/users_profile/{user_id}', [ApiDashboardController::class,'users_profile']);
    Route::post('/users_profile/userUpdate/{user_id}', [ApiDashboardController::class, 'userUpdate']);
});
