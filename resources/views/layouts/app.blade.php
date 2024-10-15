<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ url('images/tablogo.png') }}" type="image/x-icon">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @include('libraries.styles')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-vh-100 bg-light">
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white shadow-sm">
                <div class="container py-2">
                    {{ $header }}
                </div>
            </header>
        @endisset

        @yield('content')

    </div>
    @include('libraries.scripts')
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

</body>

</html>
