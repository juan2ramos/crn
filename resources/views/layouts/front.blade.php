<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="juan2ramos">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')  </title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>
<body data-site="{{env('APP_URL')}}" id="body">
<header class="Header">

</header>

<main>
    @yield('content')
</main>
<footer class="Footer row justify-center back-primary align-center">

</footer>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
