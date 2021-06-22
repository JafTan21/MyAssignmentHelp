<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet"
        type="text/css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js">
    </script>

    {{-- tiny mce --}}
    <script src="https://cdn.tiny.cloud/1/ry369bid9umzbo5g7wdmx0wr4y4gnbmyv56b1xq7h22s5bw3/tinymce/5/tinymce.min.js"
        referrerpolicy="origin">
    </script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <style>
        html,
        body {
            scroll-behavior: smooth;
        }
    </style>
    @livewireStyles
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
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>@if (Session::has('success'))
    <script>
        Swal.fire({
            position: 'top-end',
                icon:'success',
                text: "{{ Session::get('success') }}",
                // timer: 1000,
            });
    </script>
    @endif

    <script>
        var editor = new FroalaEditor('#editor', {
            imageUploadParam: 'image_param',
            imageUploadMethod: 'post',
            imageUploadURL: "{{ route('image.store') }}",
            imageUploadParams: {
                froala: 'true',
                _token: "{{ csrf_token() }}"
            }
        })


    </script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js">
    </script>
    <script>
        tinymce.init({
      selector: '.editor-2',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak table advtable lists advlist fullpage fullscreen ',
      toolbar_mode: 'floating',
   });

   $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>

    @livewireScripts

    <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"
        integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous">
    </script>
    @yield('scripts', '')
</body>

</html>