      <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    {{-- Language Switcher Flags --}}
    <link rel="stylesheet" href="path/to/flag-icon-css/css/flag-icon.min.css">

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
            </style>
        @break

    @default
        <style> html{direction:ltr;}</style>

    @endswitch

    {{-- End Direction --}}

