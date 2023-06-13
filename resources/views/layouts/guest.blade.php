<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @switch(App::getlocale())

            @case('ar')
                <style>
                    html{direction:rtl;}
                    @font-face
                    {
                        src: url("{{asset('assets/fonts/changafont/static/Changa-Light.ttf')}}");
                        font-family:'Changa-Light';
                    }
                    body{
                            font-family:'Changa-Light', sans-serif!important;
                        }
                </style>
            @break

            @case('en')
                <style>
                    html{direction:ltr;}
                </style>
            @break

        @default
            <style> html{direction:ltr;}</style>

        @endswitch
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body dir="{{App::getlocale() == 'ar' ? 'rtl' : 'ltr'}}">
        <div class=" text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
