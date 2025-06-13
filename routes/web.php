<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/about', function () {
    return view('overons');
})->name('about');


// Route::get('/login', function () {
//     return view('login');
// })->name('login');


Route::get('/series', function () {
    return view('series');
})->name('series');


Route::get('/sponsoren', function () {
    return view('sponsoren');
})->name('sponsoren');


Route::get('/show', function () {
    return view('show');
})->name('show');

Route::get('/shows/{id}', function ($id) {
    return view('shows', ['id' => $id]);
})->name('shows');


require __DIR__.'/auth.php';
