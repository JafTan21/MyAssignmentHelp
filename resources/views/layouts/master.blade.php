<!doctype html>
<html lang="en-US" style="overflow-x:hidden;">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/userpanel/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mega_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sm-blue/sm-blue.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sm-clean/sm-clean.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sm-simple/sm-simple.css') }}">

    <style class="">
        .sm-blue ul a,
        .sm-blue ul a:hover,
        .sm-blue ul a:focus,
        .sm-blue ul a:active,
        .sm-blue ul a.highlighted {
            padding: 2px 23px !important;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/hover.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet"
        type="text/css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js">
    </script>
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}" class="">
</head>

<body>

    <input type="hidden" id="user" value="{{ auth()->user()->id ?? 'anonymous' }}" readonly class="d-none">
    <input type="hidden" id="name" value="{{ auth()->user()->name ?? 'anonymous' }}" readonly class="d-none">
    <div style="width: 100%; height: 650px;" class="__flex-center hide-on-load">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @include('layouts.parts.user.header')

    <main class="">
        @yield('content')
    </main>

    @include('layouts.parts.user.chat')
    @include('layouts.parts.user.footer')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/4d479e17c4.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/mega_menu.js') }}"></script>

    <script src="{{ asset('js/custom_counter.js') }}"></script>
    <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"
        integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous">
    </script>

    {{-- custom js --}}
    <script src="{{ asset('js/userpanel/homepage.js') }}"></script>
    <script src="{{ asset('js/userpanel/chat.js') }}"></script>

    @yield('scripts')
</body>

</html>