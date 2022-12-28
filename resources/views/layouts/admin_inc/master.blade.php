<!doctype html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!--    <title>{{ config('app.name', 'Laravel') }}</title>
-->
<title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <!-- Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body>

    @include('layouts.admin_inc.admin-navbar')

    <div id="layoutSidenav">

        @include('layouts.admin_inc.admin-sidebar')

        <div id="layoutSidenav_content ">
            <main >
                @yield('content')
            </main>
            {{-- @include('layouts.admin_inc.admin-footer') --}}
        </div>

    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}" ></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    @yield('scripts')
</body>
</html>

