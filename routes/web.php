<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/about', function () {
    return view('overons');
})->name('about');


Route::get('/login', function () {
    return view('login');
})->name('login');


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


// Route::get('/register', function () {
//     return view('register');
// })->name('register');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::get('/profile', [ProfileController::class, 'edit']);
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
