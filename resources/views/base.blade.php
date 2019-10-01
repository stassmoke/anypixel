<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ time() }}">
    <script src="https://kit.fontawesome.com/efc7be1369.js"></script>
    <title>Anypixel @isset($titlePage)- {{ $titlePage }}@endisset</title>
</head>
<body>

    
        @include('includes.header')

        @yield('body')
    
    

    <script src="{{ asset('js/app.js') }}?v={{ time() }}"></script>

    @include('includes.modals')
    @include('includes.footer')
</body>
</html>
