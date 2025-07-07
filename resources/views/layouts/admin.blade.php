<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Travel Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('partials.header')

    <div class="container my-4">

        @yield('content')

    </div>
    
</body>
</html>