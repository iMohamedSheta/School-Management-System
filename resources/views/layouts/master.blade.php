<!DOCTYPE html>
<html lang="{{App::getlocale()}}" >

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <title>{{ config('app.name') }} - Dashboard </title>

    {{-- ----------- Links ------------- --}}

    @include('layouts.links')

    {{-- ----------- Links ------------- --}}


</head>




    <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500 h-screen " >

                                {{------------------------ Sidebar  ----------------------------------}}

    @switch(App::getlocale())

        @case('ar')
            @include('layouts.ar.main-sidebar')
        @break

        @case('en')
            @include('layouts.en.main-sidebar')
        @break

    @default
        @include('layouts.en.main-sidebar')

    @endswitch

                                {{------------------------ End Sidebar  --------------------------------}}


            {{------------------------------------------------------ Main Tag  ------------------------------------------------------------}}

        @switch(App::getlocale())

            @case('ar')
                <main id="mainRight" class="ease-soft-in-out xl:mr-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            @break

            @case('en')
                <main id="mainLeft" class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            @break

        @default
            <main id="mainLeft" class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">

        @endswitch



                                {{------------------------ Navbar  ----------------------------------}}

        @switch(App::getlocale())

            @case('ar')
                @include('layouts.ar.main-header')
            @break

            @case('en')
                @include('layouts.en.main-header')
            @break

        @default
            @include('layouts.en.main-header')

        @endswitch
                            {{------------------------ END Navbar  ----------------------------------}}




            {{------------------------ Content  ----------------------------------}}

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div style="height:175vh">
                            {{-- @yield('content') --}}
                        </div>
                    </div>
                </div>
            </div>

            {{--------------------- End Content  ----------------------------------}}




                                {{------------------------ Footer  ----------------------------------}}
        @switch(App::getlocale())

            @case('ar')
                @include('layouts.ar.footer')
            @break

            @case('en')
                @include('layouts.en.footer')
            @break

        @default
            @include('layouts.en.footer')

        @endswitch
        {{------------------------ End Footer  --------------------------------}}

    </main>
            {{-------------------------------------------------------- End Main Tag  -------------------------------------------------------------------}}



                        {{----------------------------------------------- Footer scripts  ----------------------------------------------------}}
                    @include('layouts.footer-scripts')
                        {{-------------------------------------------  End Footer scripts  ----------------------------------------------------}}

</body>





</html>
