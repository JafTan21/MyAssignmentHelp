<!doctype html>
<html lang="en-US" style="overflow-x:hidden;">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/userpanel/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mega_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sm-blue/sm-blue.css') }}">

    {{-- menu plugin --}}
    <link rel="stylesheet" href="{{ asset('css/zeynep.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/left.css') }}">

    <link rel="stylesheet" href="{{ asset('css/hover.css') }}">
</head>

<body>
    <div style="width: 100%; height: 650px;" class="__flex-center hide-on-load">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @include('layouts.parts.header')

    <main class="">
        @yield('content')
    </main>

    @include('layouts.parts.footer')
    <div class="zeynep-overlay"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/4d479e17c4.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/mega_menu.js') }}"></script>

    {{-- menu plugin --}}
    <script src="{{ asset('js/zeynep.min.js') }}"></script>

    <script src="{{ asset('js/custom_counter.js') }}"></script>
    {{-- custom js --}}
    <script src="{{ asset('js/userpanel/homepage.js') }}"></script>

</body>

</html>