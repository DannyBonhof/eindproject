@extends('layouts.master')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/favourites.css') }}">
@endsection

@section('content')

        <?php
    $url = "https://api.tvmaze.com/shows";

    $response = file_get_contents($url);

    if ($response === FALSE) {
        die("Kon geen data ophalen van de API.");
    }

    $shows = json_decode($response, true);

    if ($shows === NULL) {
        die("Kon JSON niet vinden.");
    }

    usort($shows, function ($a, $b) {
        $ratingA = $a['rating']['average'] ?? 0;
        $ratingB = $b['rating']['average'] ?? 0;
        return $ratingB <=> $ratingA;
    });

    $top10 = array_slice($shows, 0, 10);
        ?>

    <p>TEST</p>

        <div class="scroll-wrapper">
        <button class="scroll-btn scroll-left" onclick="scrollShows(-200)" aria-label="Scroll naar links">&#8592;</button>
        <div class="scroll-container" id="scrollContainer">
            <?php
    foreach ($top10 as $show) {
        $image = $show['image']['medium'] ?? 'https://via.placeholder.com/180x250?text=Geen+afbeelding';
        $rating = $show['rating']['average'] ?? 'N.v.t.';
        echo '<div class="show">';
        $name = urlencode($show['name']);
        echo '<a href="/show?id=' . $show['id'] . '">';
        echo '<img src="' . htmlspecialchars($image) . '" alt="' . htmlspecialchars($show['name']) . '">';
        echo '</a>';
        echo '<div class="rating">Rating: ' . htmlspecialchars($rating) . '</div>';
        echo '</div>';
    }
            ?>
        </div>
        <button class="scroll-btn scroll-right" onclick="scrollShows(200)" aria-label="Scroll naar rechts">&#8594;</button>
    </div>

@endsection

