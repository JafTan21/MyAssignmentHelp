<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <!-- Google Font: Source Sans Pro -->
    {{-- <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    {{-- <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <style>
        html,
        body {
            scroll-behavior: smooth;
        }
    </style>
    @livewireStyles

    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">

    <input type="hidden" id="user" value="{{ auth()->id() }}" readonly class="d-none">

    <!-- Site wrapper -->
    <div class="wrapper">
        @include('layouts.parts.admin.header')
        @include('layouts.parts.admin.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                @yield('page-header', 'Adminpanel')
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            {{-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol> --}}
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('layouts.parts.admin.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}">
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    @if (Session::has('success'))
    <script>
        Swal.fire({
            position: 'top-end',
                icon:'success',
                text: "{{ Session::get('success') }}",
            });
    </script>
    @endif

    @if (Session::has('error'))
    <script>
        Swal.fire({
            position: 'top-end',
                icon:'error',
                text: "{{ Session::get('error') }}",
            });
    </script>
    @endif
    <script src="https://kit.fontawesome.com/4d479e17c4.js" crossorigin="anonymous"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js">
    </script>
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>

    @livewireScripts

    @yield('scripts', '')
</body>

</html>