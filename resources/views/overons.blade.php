@extends('layouts.master')

@section('title', 'Over ons')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/OverOns.css') }}">
        <title>Over ons</title>
    </head>

    <body>

        <div id="OverOnsContainer">
            <div id="OverOnsBlok1">
                <h1>Over Ons</h1>
            </div>

            <div id="OverOnsBlok2">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione voluptatum qui voluptates voluptatem
                    quas, quo ab iste doloremque voluptate numquam facilis esse maiores hic minima, non necessitatibus
                    corrupti temporibus pariatur!</p>
            </div>
        </div>

        <div id="PrivacyContainer">
            <div id="PrivacyBlok1">
                <h1>Privacy</h1>
            </div>

            <div id="PrivacyBlok2">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione voluptatum qui voluptates voluptatem
                    quas, quo ab iste doloremque voluptate numquam facilis esse maiores hic minima, non necessitatibus
                    corrupti temporibus pariatur!</p>
            </div>
        </div>



    </body>

    </html>

@endsection