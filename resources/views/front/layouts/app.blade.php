<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    <title>@yield('title') | {{ config('section')->name }}</title>
    <!-- favicon.ico -->
    <link rel="icon" href="{{ asset('front/favicon.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('front.layouts.meta')
    @include('front.layouts.links')
    @include('front.layouts.styles')
    @stack('css')
</head>

<body>
    <div class="page-wrapper">
        @include('front.app.header')
        @yield('content')
        @include('front.sections.brands')
        @include('front.app.footer')
    </div>
    @include('front.app.nav')
    @include('front.app.requestModal')
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>

    @include('front.layouts.scripts')
    @push('js')


    </body>

    </html>
