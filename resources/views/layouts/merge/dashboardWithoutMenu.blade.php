<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="apple-touch-icon" sizes="180x180" href="/dashboard/img/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/dashboard/img/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/dashboard/img/favicon.ico">

    <title>@yield('titulo')</title>
    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/dashboard/vendors/iconic-fonts/font-awesome/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/dashboard/vendors/iconic-fonts/flat-icons/flaticon.css">
    <link rel="stylesheet" href="/dashboard/vendors/iconic-fonts/cryptocoins/cryptocoins.css">
    <link rel="stylesheet" href="/dashboard/vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css">
    <!-- Bootstrap core CSS -->
    <link href="/dashboard/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="/dashboard/css/jquery-ui.min.css" rel="stylesheet">
    <!-- Medboard styles -->
    <link href="/dashboard/css/style.css" rel="stylesheet">

</head>

<body class="ms-body ms-primary-theme">

    @yield('content')
    <!-- SCRIPTS -->
    <!-- Global Required Scripts Start -->
    <script src="/dashboard/js/jquery-3.3.1.min.js"></script>
    <script src="/dashboard/js/popper.min.js"></script>
    <script src="/dashboard/js/bootstrap.min.js"></script>
    <script src="/dashboard/js/perfect-scrollbar.js"></script>
    <script src="/dashboard/js/jquery-ui.min.js"></script>
    <!-- Global Required Scripts End -->
    <!-- Medboard core JavaScript -->
    <script src="/dashboard/js/framework.js"></script>
    <!-- Settings -->
    <script src="/dashboard/js/settings.js"></script>
</body>

</html>
