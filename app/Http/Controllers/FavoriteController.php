<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add($id)
    {
        $user = Auth::user();

        // Add the serie to the user's favorites (will not duplicate)
        if ($user) {
            $user->favourites()->syncWithoutDetaching([$id]);
        }

        return view('favouritesAdd', [
            'serie_id' => $id,
            'user_id' => $user ? $user->id : null,
        ]);
    }

    public function deleteFavourite(\Illuminate\Http\Request $request)
    {
        $user = Auth::user();
        $showId = $request->input('show_id');
        if ($user && $showId) {
            $user->favourites()->detach($showId);
        }
        return redirect()->back();
    }
}