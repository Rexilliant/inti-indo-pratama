<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Dynamic Title --}}
    <title>@yield('title', config('app.name', 'BHOS Teknologi') . ' - Pupuk Nano Inovatif')</title>

    {{-- SEO Meta Tags --}}
    <meta name="description" content="@yield('meta_description', 'PT Grace Indo Pratama - BHOS Teknologi menghadirkan pupuk nano inovatif untuk meningkatkan produktivitas pertanian Indonesia secara optimal dan berkelanjutan.')">
    <meta name="keywords" content="@yield('meta_keywords', ' BHOS Teknologi, PT Grace Indo Pratama, pupuk inovatif, pertanian modern, pupuk nano Indonesia, nutrisi tanaman')">
    <meta name="author" content="PT Grace Indo Pratama">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">

    {{-- Canonical URL --}}
    <link rel="canonical" href="@yield('canonical', url()->current())">

    {{-- Open Graph (Facebook, WhatsApp, LinkedIn) --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('og_title', 'BHOS Teknologi - Pupuk Nano Inovatif')">
    <meta property="og:description" content="@yield('og_description', 'PT Grace Indo Pratama - BHOS Teknologi menghadirkan pupuk nano inovatif untuk meningkatkan produktivitas pertanian Indonesia.')">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:image" content="@yield('og_image', asset('assets_img/hero.png'))">
    <meta property="og:site_name" content="{{ config('app.name', 'BHOS Teknologi') }}">
    <meta property="og:locale" content="id_ID">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'BHOS Teknologi - Pupuk Nano Inovatif')">
    <meta name="twitter:description" content="@yield('og_description', 'PT Grace Indo Pratama - BHOS Teknologi menghadirkan pupuk nano inovatif untuk meningkatkan produktivitas pertanian Indonesia.')">
    <meta name="twitter:image" content="@yield('og_image', asset('assets_img/hero.png'))">

    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])

    @yield('addCss')
</head>
