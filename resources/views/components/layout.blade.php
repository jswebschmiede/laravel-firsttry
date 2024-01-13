<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Page' }} - FirstTry</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="flex flex-col min-h-full font-sans antialiased">
    <x-ui.header />

    <main class="flex-1">
        {{ $slot }}
    </main>

    <x-ui.footer />
</body>

</html>
