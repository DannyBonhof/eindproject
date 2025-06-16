<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Serie;

class SerieController extends Controller
{
    // Add favorite series
    public function favorite($id)
    {
        $user = Auth::user();

        // Attach the serie to the user's favorites (prevent duplicates)
        $user->favoriteSeries()->syncWithoutDetaching([$id]);

        return redirect()->back()->with('success', 'Series added to favorites!');
    }
}
