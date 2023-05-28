
<!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    {{-- Jquery CDN --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}


        @livewireStyles()
        @powerGridStyles()

        <!-- Main Styling -->
        <link href="{{ asset('assets/css/soft-ui-dashboard-tailwind.css?v=1.0.4') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('assets/fonts/changafont/static/Changa-Light.ttf')}}">

        @vite(['resources/css/app.css','resources/js/app.js'])

        <link rel="stylesheet" href="{{ asset('assets/fonts/sheta/sheta.ttf') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/sheta-icons.css') }}">



        @yield('styles')




    {{-- Direction --}}

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
                body {
                    font-family: "Roboto", sans-serif !important;
                }

            </style>
        @break

    @default
        <style> html{direction:ltr;}</style>

    @endswitch

    {{-- End Direction --}}

