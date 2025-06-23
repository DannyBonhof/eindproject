@extends('layouts.master')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/favourites.css') }}">
@endsection

@section('content')

<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// 1. Get the current user's favourite serie IDs
$user = Auth::user();
$favouriteIds = [];
if ($user) {
    $favouriteIds = DB::table('favourites')
        ->where('user_id', $user->id)
        ->pluck('serie_id')
        ->toArray();
}

$url = "https://api.tvmaze.com/shows";
$response = file_get_contents($url);

if ($response === FALSE) {
    die("Kon geen data ophalen van de API.");
}

$shows = json_decode($response, true);

if ($shows === NULL) {
    die("Kon JSON niet vinden.");
}

// 2. Filter the shows to only those in favourites
$favouriteShows = array_filter($shows, function($show) use ($favouriteIds) {
    return in_array($show['id'], $favouriteIds);
});
?>

@if(empty($favouriteShows))
    <p>Je hebt nog geen favoriete series toegevoegd.</p>
@else
    <div class="scroll-wrapper">
        <button class="scroll-btn scroll-left" onclick="scrollShows(-200)" aria-label="Scroll naar links">&#8592;</button>
        <div class="scroll-container" id="scrollContainer">
            <?php
            foreach ($favouriteShows as $show) {
                $image = $show['image']['medium'] ?? 'https://via.placeholder.com/180x250?text=Geen+afbeelding';
                $rating = $show['rating']['average'] ?? 'N.v.t.';
                echo '<div class="show">';
                $name = urlencode($show['name']);
                echo '<a href="/show?id=' . $show['id'] . '">';
                echo '<img src="' . htmlspecialchars($image) . '" alt="' . htmlspecialchars($show['name']) . '">';
                echo '</a>';
                echo '<form method="POST" action="' . url('favourite/delete') . '" style="margin-top:10px;">';
                echo csrf_field();
                echo '<input type="hidden" name="show_id" value="' . $show['id'] . '">';
                echo '<button type="submit" class="verwijder-knop">Verwijder uit Mijn Lijst</button>';
                echo '</form>';
                echo '<div class="rating">Rating: ' . htmlspecialchars($rating) . '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <button class="scroll-btn scroll-right" onclick="scrollShows(200)" aria-label="Scroll naar rechts">&#8594;</button>
    </div>
@endif

@endsection

