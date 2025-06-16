<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class favouritesController extends Controller
{
    //
}

use Illuminate\Support\Facades\Auth;

function goToFavourites()
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    return view('favourites'); // Or redirect to a route
}
