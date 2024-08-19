<?php

use App\Http\Controllers\Dashboard\WebDashboardController;
use App\Http\Controllers\Auth\WebAuthController;
use Illuminate\Support\Facades\Route;

Route::post('/user_login',[WebAuthController::class,'user_login']);
Route::post('/user_register',[WebAuthController::class,'user_register']);
Route::get('/user_delete/{user_id}',[WebAuthController::class,'user_delete']);

// ------- shop View -------
Route::get('/', function () {return view('shop.layouts.content.index');})->name('home');
Route::get('/register', function () {return view('shop.layouts.content.register');});
Route::get('/login', function () {return view('shop.layouts.content.login');})->name('login-form');


// ------- admin dashboard View -------
Route::prefix('/dashboard')->group(function () {
//    Route::get('/home', [WebDashboardController::class, 'home'])->name('dashboard-index');;

//    --------- Users list ---------
    Route::get('/home', function () {return view('dashboard.layouts.content.index');})->name('dashboard-index');;
    Route::get('/users_list', [WebDashboardController::class, 'users_list'])->name('dashboard-user_list');
    Route::post('/users_list/addUser', [WebDashboardController::class, 'addUser'])->name('dashboard-user_list-addUser');

    //    --------- Users profile ---------
    Route::get('/users_profile', [WebDashboardController::class, 'users_profile'])->name('dashboard-users_profile');

    //    --------- Users permissions ---------
//    Route::get('/users_permissions', [WebDashboardController::class, 'users_permissions'])->name('dashboard-users_permissions');

    //Route::get('/users_profile/{user_id}', [WebDashboardController::class,'users_profile']);
    Route::post('/users_profile/userUpdate/{user_id}', [WebDashboardController::class, 'userUpdate']);
});

