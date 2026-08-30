<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>Document</title> --}}
    <title>@yield('title', config('app.name', 'BHOS Teknologi'))</title>
   
    {{-- Tab browser --}}
    <link rel="icon" href="{{ asset('assets_img/logo.png') }}" sizes="16x16" type="image/png">
    <link rel="icon" href="{{ asset('assets_img/logo.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets_img/logo.png') }}" sizes="192x192" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('assets_img/logo.png') }}" sizes="180x180">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('addCss')
</head>
