<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="robots" content="all">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', '-') | {{ config('app.name') }}</title>

        <meta name="keywords" content="{{ config('app.name') }}">
        <meta name="description" content="@yield('description', '-') | {{ config('app.name') }}">

        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="@yield('title', '-') | {{ config('app.name') }}">
        <meta name="twitter:description" content="@yield('description', '-') | {{ config('app.name') }}">
        <meta name="twitter:image" content="{{ Vite::asset('resources/favicon/512x512.png') }}?v=0.1">

        <meta property="og:url" content="{{ request()->url() }}">
        <meta property="og:type" content="website">
        <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
        <meta property="og:site_name" content="{{ config('app.name') }}">
        <meta property="og:title" content="@yield('title', '-') | {{ config('app.name') }}">
        <meta property="og:description" content="@yield('description', '-') | {{ config('app.name') }}">
        <meta property="og:image" content="{{ Vite::asset('resources/favicon/512x512.png') }}?v=0.1">

        <link rel="canonical" href="{{ request()->fullUrl() }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=mulish:200,300,400,500,600,700,800,900&display=swap">

        <link href="{{ Vite::asset('resources/favicon/120x120.png') }}?v=0.1" rel="icon" type="image/png">
        <link href="{{ Vite::asset('resources/favicon/16x16.png') }}?v=0.1" rel="shortcut icon" sizes="16x16">
        <link href="{{ Vite::asset('resources/favicon/32x32.png') }}?v=0.1" rel="shortcut icon" sizes="32x32">
        <link href="{{ Vite::asset('resources/favicon/48x48.png') }}?v=0.1" rel="shortcut icon" sizes="48x48">
        <link href="{{ Vite::asset('resources/favicon/96x96.png') }}?v=0.1" rel="shortcut icon" sizes="96x96">
        <link href="{{ Vite::asset('resources/favicon/120x120.png') }}?v=0.1" rel="shortcut icon" sizes="120x120">
        <link href="{{ Vite::asset('resources/favicon/128x128.png') }}?v=0.1" rel="shortcut icon" sizes="128x128">
        <link href="{{ Vite::asset('resources/favicon/144x144.png') }}?v=0.1" rel="shortcut icon" sizes="144x144">
        <link href="{{ Vite::asset('resources/favicon/180x180.png') }}?v=0.1" rel="shortcut icon" sizes="180x180">
        <link href="{{ Vite::asset('resources/favicon/192x192.png') }}?v=0.1" rel="shortcut icon" sizes="192x192">
        <link href="{{ Vite::asset('resources/favicon/512x512.png') }}?v=0.1" rel="shortcut icon" sizes="512x512">
        <link href="{{ Vite::asset('resources/favicon/16x16.png') }}?v=0.1" rel="apple-touch-icon" sizes="16x16">
        <link href="{{ Vite::asset('resources/favicon/32x32.png') }}?v=0.1" rel="apple-touch-icon" sizes="32x32">
        <link href="{{ Vite::asset('resources/favicon/48x48.png') }}?v=0.1" rel="apple-touch-icon" sizes="48x48">
        <link href="{{ Vite::asset('resources/favicon/96x96.png') }}?v=0.1" rel="apple-touch-icon" sizes="96x96">
        <link href="{{ Vite::asset('resources/favicon/120x120.png') }}?v=0.1" rel="apple-touch-icon" sizes="120x120">
        <link href="{{ Vite::asset('resources/favicon/128x128.png') }}?v=0.1" rel="apple-touch-icon" sizes="128x128">
        <link href="{{ Vite::asset('resources/favicon/144x144.png') }}?v=0.1" rel="apple-touch-icon" sizes="144x144">
        <link href="{{ Vite::asset('resources/favicon/180x180.png') }}?v=0.1" rel="apple-touch-icon" sizes="180x180">
        <link href="{{ Vite::asset('resources/favicon/192x192.png') }}?v=0.1" rel="apple-touch-icon" sizes="192x192">
        <link href="{{ Vite::asset('resources/favicon/512x512.png') }}?v=0.1" rel="apple-touch-icon" sizes="512x512">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @yield('content')
    </body>
</html>
