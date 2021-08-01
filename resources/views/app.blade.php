<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Movie app</title>
    @include('layouts.style')
</head>
<body>
    @include('layouts.header')
    @include('layouts.scripts')
    @yield('content')
</body>
</html>