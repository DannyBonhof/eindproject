<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/overons', function () {
    return view('overons');
});

Route::get('/privacy', function () {
    return view('privacy');
});