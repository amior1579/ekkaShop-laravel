<?php

use App\Http\Controllers\Dashboard\WebDashboardController;
use App\Http\Controllers\Auth\WebAuthController;
use Illuminate\Support\Facades\Route;

Route::post('/user_login',[WebAuthController::class,'user_login']);
Route::post('/user_register',[WebAuthController::class,'user_register']);

// ------- shop View -------
Route::get('/', function () {return view('shop.layouts.content.index');})->name('home');
Route::get('/register', function () {return view('shop.layouts.content.register');});
Route::get('/login', function () {return view('shop.layouts.content.login');})->name('login-form');


// ------- admin dashboard View -------
Route::prefix('/dashboard')->group(function () {
//    Route::get('/home', [WebDashboardController::class, 'home'])->name('dashboard-index');;

    Route::get ('/home', function () {return view('dashboard.layouts.content.index');})->name('dashboard-index');

//    --------- Users list ---------
    Route::get ('/users_list', [WebDashboardController::class, 'users_list'])->name('dashboard-users_list');
    Route::post('/users_list/addUser', [WebDashboardController::class, 'users_list__addUser'])->name('dashboard-users_list-addUser');
    Route::get ('/users_list/deleteUser/{userId}',[WebDashboardController::class,'users_list__deleteUser'])->name('dashboard-users_list-deleteUser');

//    --------- Users profile ---------
    Route::get('/user_profile', [WebDashboardController::class, 'user_profile'])->name('dashboard-user_profile');
    Route::post('/user_profile/updateUser/{userId}', [WebDashboardController::class, 'user_profile__updateUser'])->name('dashboard-user_profile-updateUser');
    Route::post('/user_profile/updatePermissions/{userId}', [WebDashboardController::class, 'user_profile__updatePermissions'])->name('dashboard-user_profile-updatePermissions');

});

