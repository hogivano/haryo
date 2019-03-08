<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/light-bootstrap-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fullpage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pe-icon-7-stroke.css') }}">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    @yield('link')
</head>
<body>
    @yield('content')
</body>
<script src="{{ asset('js/jquery.3.2.1.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/fullpage.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/chartist.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/bootstrap-select.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/bootstrap-notify.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/light-bootstrap-dashboard.js') }}" charset="utf-8"></script>
@yield('script')
</html>
