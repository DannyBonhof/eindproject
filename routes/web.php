<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/series', function () {
    return view('series');
})->name('series');

Route::get('/overons', function () {
    return view('overons');
})->name('overons');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/sponsoren', function () {
    return view('sponsoren');
})->name('sponsoren');