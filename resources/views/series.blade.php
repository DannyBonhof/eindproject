@extends('layouts.master')

@section('title', 'Series')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/series.css') }}">

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

    $genresToShow = [
        'Comedy' => 'Comedy',
        'Horror/Thriller' => ['Horror', 'Thriller'],
        'Action' => 'Action',
        'Fiction' => 'Science-Fiction',
        'Drama' => 'Drama',
        'romance' => 'Romance',
        'Fantasy' => 'Fantasy',
        'Crime' => 'Crime',
    ];

    function filterShowsByGenre($shows, $genre)
    {
        if (is_array($genre)) {
            return array_filter($shows, function ($show) use ($genre) {
                return count(array_intersect($show['genres'], $genre)) > 0;
            });
        } else {
            return array_filter($shows, function ($show) use ($genre) {
                return in_array($genre, $show['genres']);
            });
        }
    }

    function sortShowsByName(&$shows)
    {
        usort($shows, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });
    }

    ?>

    @foreach ($genresToShow as $label => $genre)
        <?php
            $filtered = filterShowsByGenre($shows, $genre);
            $filtered = array_values($filtered);
            sortShowsByName($filtered);
            $top100 = array_slice($filtered, 0, 100);
            ?>
        <h2 id="GenreTitle">{{ is_array($genre) ? implode('/', $genre) : $genre }}</h2>
        <div class="scroll-wrapper">
            <button class="scroll-btn scroll-left"
                onclick="scrollShows(-200, '{{ Str::slug(is_array($genre) ? implode('-', $genre) : $genre) }}')"
                aria-label="Scroll naar links">&#8592;</button>
            <div class="scroll-container"
                id="scrollContainer-{{ Str::slug(is_array($genre) ? implode('-', $genre) : $genre) }}">
                <?php
            foreach ($top100 as $show) {
                $image = $show['image']['medium'] ?? 'https://via.placeholder.com/180x250?text=Geen+afbeelding';
                $genres = !empty($show['genres']) ? implode(', ', $show['genres']) : 'N.v.t.';
                echo '<div class="show">';
                echo '<a href="/show?id=' . $show['id'] . '">';
                echo '<img src="' . htmlspecialchars($image) . '" alt="' . htmlspecialchars($show['name']) . '">';
                echo '</a>';
                echo '<div class="rating">Genre: ' . htmlspecialchars($genres) . '</div>';
                echo '</div>';
            }
                ?>
            </div>
            <button class="scroll-btn scroll-right"
                onclick="scrollShows(200, '{{ Str::slug(is_array($genre) ? implode('-', $genre) : $genre) }}')"
                aria-label="Scroll naar rechts">&#8594;</button>
        </div>
    @endforeach

    <script>
        function scrollShows(amount, containerId) {
            const container = document.getElementById('scrollContainer-' + containerId);
            if (container) {
                container.scrollBy({ left: amount, behavior: 'smooth' });
            }
        }
    </script>
@endsection