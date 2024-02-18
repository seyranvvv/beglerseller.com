    <!-- SEO -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="{{ config('section')->name }}" />
    <link rel="canonical" href="{!! URL::current() !!}">
    <meta name="description" content="{{ config('section')->description }}">
    <meta name="keywords" content="{{ config('section')->name }}, @yield('keywords')">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="{{ config('section')->primary_color }}">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="{{ config('section')->primary_color }}">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="{{ config('section')->primary_color }}">

    <!-- Social:Twitter -->
    <meta name="twitter:title" content="{{ config('section')->name }}">
    <meta name="twitter:description" content="{{ config('section')->description }}">
    <meta name="twitter:image:src" content="@yield('image')">


    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('/favicon/safari-pinned-tab.svg') }}" color="#7dd55b">
    <link rel="shortcut icon" href="{{ asset('/favicon/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="msapplication-config" content="{{ asset('/favicon/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-title" content="Ykjam Senagat">
    <meta name="application-name" content="Ykjam Senagat">


    <!-- Social:Facebook / Open Graph -->
    <meta property="og:url" content="{!! URL::current() !!}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ config('section')->name }}">
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:description" content="{{ config('section')->description }}">
    <meta property="og:site_name" content="{{ config('section')->name }}">

    <!-- Social:Google+ / Schema.org  -->
    <meta itemprop="name" content="{{ config('section')->name }}">
    <meta itemprop="description" content="{{ config('section')->description }}">
    <meta itemprop="image" content="@yield('image')">
