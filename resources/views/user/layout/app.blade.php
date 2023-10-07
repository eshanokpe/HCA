<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCA | Patient Board</title>
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/solid.min.css">
    <!-- Material Icons -->
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
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
        @include('user.layout.sidenav')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('user.layout.nav')
        @yield('content')
    </main>

    @include('layout.footer')
