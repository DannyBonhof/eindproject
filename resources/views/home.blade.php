@extends('layouts.master')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection


@section('content')

    <?php
    function getRandomShow($maxId = 3000)
    {
        $tries = 0;
        do {
            $id = rand(1, $maxId);
            $url = "https://api.tvmaze.com/shows/$id";
            $response = @file_get_contents($url);

            if ($response === FALSE) {
                $tries++;
                continue;
            }

            $show = json_decode($response, true);
            if (isset($show['name'])) {
                return $show;
            } else {
                $tries++;
            }
        } while ($tries < 10);

        return null;
    }

    $show = getRandomShow();
    $show1 = getRandomShow();
    $show2 = getRandomShow();
    $show3 = getRandomShow();
    $show4 = getRandomShow();
        ?>

    <body>
    <div class="ShowButton">
        <div id="show">
            <?php if ($show): ?>
            <?php    if (isset($show['image']['medium'])): ?>
            <a href="/show?id=<?= $show['id'] ?>">
                <img src="<?= htmlspecialchars($show['image']['medium']) ?>" alt="<?= htmlspecialchars($show['name']) ?>">
            </a>
            <?php    endif; ?>
            <p><strong>Titel:</strong> <?= htmlspecialchars($show['name']) ?></p>
            <p><strong>Genres:</strong> <?= htmlspecialchars(implode(', ', $show['genres'])) ?></p>
            <p><strong>Rating:</strong> <?= htmlspecialchars($show['rating']['average'] ?? 'N.v.t.') ?></p>
            <?php else: ?>
            <p>Kon geen serie laden, probeer het opnieuw.</p>
            <?php endif; ?>
        </div>
        <div id="show">
            <?php if ($show1): ?>
            <?php    if (isset($show1['image']['medium'])): ?>
            <a href="/show?id=<?= $show1['id'] ?>">
                <img src="<?= htmlspecialchars($show1['image']['medium']) ?>" alt="<?= htmlspecialchars($show1['name']) ?>">
            </a>
            <?php    endif; ?>
            <p><strong>Titel:</strong> <?= htmlspecialchars($show1['name']) ?></p>
            <p><strong>Genres:</strong> <?= htmlspecialchars(implode(', ', $show1['genres'])) ?></p>
            <p><strong>Rating:</strong> <?= htmlspecialchars($show1['rating']['average'] ?? 'N.v.t.') ?></p>
            <?php else: ?>
            <p>Kon geen serie laden, probeer het opnieuw.</p>
            <?php endif; ?>
        </div>
        <div id="show">
            <?php if ($show2): ?>
            <?php    if (isset($show2['image']['medium'])): ?>
            <a href="/show?id=<?= $show2['id'] ?>">
                <img src="<?= htmlspecialchars($show2['image']['medium']) ?>" alt="<?= htmlspecialchars($show2['name']) ?>">
            </a>
            <?php    endif; ?>
            <p><strong>Titel:</strong> <?= htmlspecialchars($show2['name']) ?></p>
            <p><strong>Genres:</strong> <?= htmlspecialchars(implode(', ', $show2['genres'])) ?></p>
            <p><strong>Rating:</strong> <?= htmlspecialchars($show2['rating']['average'] ?? 'N.v.t.') ?></p>
            <?php else: ?>
            <p>Kon geen serie laden, probeer het opnieuw.</p>
            <?php endif; ?>
        </div>
        <div id="show">
            <?php if ($show3): ?>
            <?php    if (isset($show3['image']['medium'])): ?>
            <a href="/show?id=<?= $show3['id'] ?>">
                <img src="<?= htmlspecialchars($show3['image']['medium']) ?>" alt="<?= htmlspecialchars($show3['name']) ?>">
            </a>
            <?php    endif; ?>
            <p><strong>Titel:</strong> <?= htmlspecialchars($show3['name']) ?></p>
            <p><strong>Genres:</strong> <?= htmlspecialchars(implode(', ', $show3['genres'])) ?></p>
            <p><strong>Rating:</strong> <?= htmlspecialchars($show3['rating']['average'] ?? 'N.v.t.') ?></p>
            <?php else: ?>
            <p>Kon geen serie laden, probeer het opnieuw.</p>
            <?php endif; ?>
        </div>
        <div id="show">
            <?php if ($show4): ?>
            <?php    if (isset($show4['image']['medium'])): ?>
            <a href="/show?id=<?= $show4['id'] ?>">
                <img src="<?= htmlspecialchars($show4['image']['medium']) ?>" alt="<?= htmlspecialchars($show4['name']) ?>">
            </a>
            <?php    endif; ?>
            <p><strong>Titel:</strong> <?= htmlspecialchars($show4['name']) ?></p>
            <p><strong>Genres:</strong> <?= htmlspecialchars(implode(', ', $show4['genres'])) ?></p>
            <p><strong>Rating:</strong> <?= htmlspecialchars($show4['rating']['average'] ?? 'N.v.t.') ?></p>
            <?php else: ?>
            <p>Kon geen serie laden, probeer het opnieuw.</p>
            <?php endif; ?>
        </div>
    </div>
    </body>

    </html>

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

    <script>
        function scrollShows(distance) {
            const container = document.getElementById('scrollContainer');
            container.scrollBy({ left: distance, behavior: 'smooth' });
        }
    </script>
@endsection