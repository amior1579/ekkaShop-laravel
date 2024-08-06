<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('shop.layouts.content.index');
})->name('home');

Route::get('/register', function () {
    return view('shop.layouts.content.register');
});

Route::get('/admin_dashboard', function () {
    return view('dashboard.adminDashboard.layouts.content.index');
});
