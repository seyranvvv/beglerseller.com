<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ config('section')->name }}</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    @stack('css')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link href="{{ asset('bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet">


    <link rel="icon" href="{{ asset('img/logo.png') }}">



    <link rel="stylesheet" href="../../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">

    <!-- Desktops -->
    {{--  <link rel="shortcut icon" href="{{ asset('assets/images/favicon-144.png') }}"> --}}

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body
    class="sidebar-dark {{ request()->routeIs('orders.index', 'transactions.index', 'products.index') ? 'sidebar-folded' : '' }}">
    <div class="main-wrapper">

        @include('admin.partials.sidebar')

        <div class="page-wrapper">

            <div class="page-content">
                @include('partials.alert')

                @yield('content')
            </div>
            @include('admin.partials.footer')

        </div>
    </div>
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>

    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>

    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/chartjs.js') }}"></script>
    <script type="text/javascript" src="{!! asset('bootstrap-colorpicker/bootstrap-colorpicker.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/bootstrap-colorpicker.js') !!}"></script>

    {{-- <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweet-alert.js') }}"></script> --}}

    @stack('js')

    <script>
        const customSwal = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary mr-2',
                cancelButton: 'btn btn-light mr-2'
            },
            buttonsStyling: false,
        });

        const Toast = customSwal.mixin({
            toast: true,
            position: 'top',
            timer: 5000,
            timerProgressBar: true,
        });



        console.log({{ json_encode($errors) }});

        function playSound() {
            let audio = new Audio('/sounds/notify.ogg');
            audio.play();
        }
    </script>

</body>

</html>
