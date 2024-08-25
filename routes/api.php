<?php

use App\Http\Controllers\Dashboard\ApiDashboardController;
use App\Http\Controllers\Auth\ApiAuthController;
use Illuminate\Support\Facades\Route;

Route::post('/user_login',[ApiAuthController::class,'user_login']);
Route::post('/user_register',[ApiAuthController::class,'user_register']);


// ------- dashboard -------
Route::prefix('/dashboard')->group(function () {
//    Route::get('/home', [ApiDashboardController::class, 'home'])->name('dashboard-index');
    Route::get('/users_list', [ApiDashboardController::class, 'users_list']);
    Route::post('/users_list/addUser', [ApiDashboardController::class, 'users_list__addUser']);
    Route::post('/users_list/deleteUser/{userId}',[ApiDashboardController::class,'users_list__deleteUser']);

    Route::get('/user_profile', [ApiDashboardController::class, 'users_profile']);
    Route::post('/user_profile/updateUser/{userId}', [ApiDashboardController::class, 'user_profile__updateUser']);

});
