<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('head')
<body class="container">
@include('navigation')
<div class="container">
    @yield('content')
</div>
</body>
</html>
