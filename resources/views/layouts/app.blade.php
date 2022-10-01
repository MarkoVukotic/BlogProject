<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.head')
<body class="container">
@include('components.navigation')
<div class="container">
    @yield('content')
</div>
</body>
</html>
