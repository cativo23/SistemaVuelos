<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }} | @yield('section')</title>

    <meta name="description" content="Voyarge">
    <meta name="author" content="grupo9BAD">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/voyarge_logo.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/voyarge_logo.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/voyarge_logo.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="{{ mix('/css/codebase.css') }}">

    @yield('css_after')

<!-- Scripts -->
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
</head>
<body>

<div id="page-container" class="main-content-boxed enable-cookies">

<!-- Main Container -->
    <main id="main-container">
        @yield('content')
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<!-- Codebase Core JS -->
<script src="{{ mix('js/codebase.app.js') }}"></script>
<scrip src="{{asset('js/codebase.app.core.js')}}"></scrip>

<!-- Laravel Scaffolding JS -->
<!-- <script src="{{ mix('js/laravel.app.js') }}"></script> -->

@yield('js_after')
</body>
</html>
