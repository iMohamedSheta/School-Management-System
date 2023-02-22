    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('assets/css/soft-ui-dashboard-tailwind.css?v=1.0.4') }}" rel="stylesheet" />

    @vite(['resources/css/app.css','resources/js/app.js'])





    {{-- Direction --}}

    @switch(App::getlocale())

        @case('ar')
            <style> html{direction:rtl;}</style>
        @break

        @case('en')
            <style> html{direction:ltr;}</style>
        @break

    @default
        <style> html{direction:ltr;}</style>

    @endswitch

    {{-- End Direction --}}

