<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Include compiled Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="h-screen w-screen bg-sky-950 font-sans leading-normal tracking-normal ">
    <main class="bg-white h-full w-full">
        @yield('content')
    </main>

</body>

</html>
