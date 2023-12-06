<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NFL tippjáték') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Public+Sans:300,400,500,700">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prosto+One&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app"></div>
    @vite('resources/js/app.js')
</body>

</html>
