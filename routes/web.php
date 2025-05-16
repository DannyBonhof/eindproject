<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
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
