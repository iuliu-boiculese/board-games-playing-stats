<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full text-white">
        <div class="min-h-full bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <header>
                <div class="flex justify-between mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold tracking-tight "> {{ $header ?? '' }}</h1>
                    <div>{{ $actions ?? '' }}</div>
                </div>
            </header>

            <main>
                <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                     {{ $slot }}
                </div>
            </main>
        </div>

    </body>
</html>
