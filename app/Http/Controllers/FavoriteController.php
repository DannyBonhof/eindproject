<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add($id)
    {
        $user = Auth::user();
        // $user->favoriteSeries()->syncWithoutDetaching([$id]); // Uncomment if you want to save
        return view('favouritesAdd', [
            'serie_id' => $id,
            'user_id' => $user ? $user->id : null,
        ]);
    }
}