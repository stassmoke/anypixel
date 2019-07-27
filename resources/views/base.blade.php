<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/efc7be1369.js"></script>
    <title>Laravel</title>
</head>
<body>

@include('header')

@yield('body')

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
