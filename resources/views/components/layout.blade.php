<!DOCTYPE html>
<html lang="lv">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body>
        <x-navbar/>
        <main class="container">
            @if(isset($slot))
                {{ $slot }}
            @endif
        </main>
        <x-footer/>
    </body>
</html>