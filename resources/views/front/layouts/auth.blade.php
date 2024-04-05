<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    <title>@yield('title') | {{ config('section')->name }}</title>
    <!-- favicon.ico -->
    <link rel="icon" href="{{ asset('front/favicon.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('front.layouts.meta')
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-4/assets/css/login-4.css">
    @stack('css')
</head>

<body>
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="card border-light-subtle shadow-sm">
                <div class="row g-0">
                    <div class="col-12 col-md-6 text-bg-primary">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <div class="col-10 col-xl-8 py-3">
                                <img class="img-fluid rounded mb-4" loading="lazy" src="./assets/img/bsb-logo-light.svg"
                                    width="245" height="80" alt="BootstrapBrain Logo">
                                <hr class="border-primary-subtle mb-4">
                                <h2 class="h1 mb-4">We make digital products that drive you to stand out.</h2>
                                <p class="lead m-0">We write words, take photos, make videos, and interact with
                                    artificial intelligence.</p>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </section>



</body>

</html>
