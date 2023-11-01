<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCA | Admin Dashboard</title>
    <link href="{{ asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/solid.min.css')}}">
    <!-- Material Icons -->
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />
    <style>
        .hid {
            display: none;
        }

        @media only screen and (max-width: 600px) {
            .hid {
                display: block;
            }

            .disp {
                display: none;
            }
        }
    </style>
</head>
<body class="g-sidenav-show  bg-gray-200">
<!-- Navbar -->
 
        
        @include('admin.layout.sidenav')

    
    <main class="main-content position-relative   border-radius-lg ">
        @include('admin.layout.nav')
        @yield('content')
    </main>

    @include('layout.footer')

 <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js')}}"></script>
    <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.1.0')}}"></script>
</body>

</html>