<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('shop.layouts.content.index');
})->name('home');
