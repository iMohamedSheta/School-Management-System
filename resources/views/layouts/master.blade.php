<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <title>{{ config('app.name') }} - @yield('Pagetitle','Dashboard') </title>

    {{-- ----------- Links ------------- --}}

    @include('layouts.links')

    {{-- ----------- Links ------------- --}}


</head>




    <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500 h-screen " >

                                {{------------------------ Sidebar  ----------------------------------}}

    @switch(App::getlocale())
                                    {{-- Right to left language put them with case ar --}}
    {{-- @case('Right to left language') --}}
        @case('ar')
            @include('layouts.rtl.main-sidebar')
        @break
                                    {{-- Left to right language put them with case en --}}
    {{-- @case('Left to right language') --}}
        @case('en')
            @include('layouts.ltr.main-sidebar')
        @break
                                        {{-- Default Language (Only Choose One!) --}}
    @default
        @include('layouts.ltr.main-sidebar')

    @endswitch



                                {{------------------------ End Sidebar  --------------------------------}}


            {{------------------------------------------------------ Main Tag  ------------------------------------------------------------}}

        @switch(App::getlocale())
                                    {{-- Right to left language put them with case ar --}}
    {{-- @case('Right to left language') --}}
            @case('ar')
                <main id="mainRight" class="ease-soft-in-out xl:mr-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200 ">
            @break
                                    {{-- Left to right language put them with case en --}}
    {{-- @case('Left to right language') --}}
            @case('en')
                <main id="mainLeft" class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            @break
                                        {{-- Default Language (Only Choose One!) --}}
        @default
            <main id="mainLeft" class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">

        @endswitch



                                {{------------------------ Navbar  ----------------------------------}}

        @switch(App::getlocale())
                                    {{-- Right to left language put them with case ar --}}
    {{-- @case('Right to left language') --}}
            @case('ar')
                @include('layouts.rtl.main-header')
            @break
                                    {{-- Left to right language put them with case en --}}
    {{-- @case('Left to right language') --}}
            @case('en')
                @include('layouts.ltr.main-header')
            @break
                                        {{-- Default Language (Only Choose One!) --}}
        @default
            @include('layouts.ltr.main-header')

        @endswitch
                            {{------------------------ END Navbar  ----------------------------------}}




            {{------------------------ Content  ----------------------------------}}

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            @yield('Content')
                    </div>
                </div>
            </div>

            {{--------------------- End Content  ----------------------------------}}




                                {{------------------------ Footer  ----------------------------------}}
        @switch(App::getlocale())
                                    {{-- Right to left language put them with case en --}}
    {{-- @case('Right to left language') --}}
            @case('ar')
                @include('layouts.rtl.footer')
            @break
                                    {{-- Left to right language put them with case en --}}
    {{-- @case('Left to right language') --}}
            @case('en')
                @include('layouts.ltr.footer')
            @break
                                        {{-- Default Language (Only Choose One!) --}}
        @default
            @include('layouts.ltr.footer')

        @endswitch
        {{------------------------ End Footer  --------------------------------}}

    </main>
            {{-------------------------------------------------------- End Main Tag  -------------------------------------------------------------------}}


            @include('sweetalert::alert')

            {{----------------------------------------------- Footer scripts  ----------------------------------------------------}}
        @include('layouts.footer-scripts')
            {{-------------------------------------------  End Footer scripts  ----------------------------------------------------}}



</body>





</html>
