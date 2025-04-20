<?php

@props(['title' => config('app.name', 'Laravel')])

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="h-full bg-slate-50 dark:bg-slate-900"
>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
          rel="stylesheet" />

    @vite(
        ['resources/css/app.css','resources/js/app.js']
    )
</head>
<body class="h-full font-sans antialiased text-slate-900 dark:text-slate-50">
    {{ $slot }}
</body>
</html>
