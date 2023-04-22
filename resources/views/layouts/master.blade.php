<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!-- Set the CSRF token for the document. -->
    <meta name="csrf-token" content="{{ csrf_token() }}" >

    <!-- Set the title of the document based on the current page title. -->
    <title>{{ config('app.name') }} - @yield('Pagetitle','Dashboard') </title>

    {{-- ----------- Links ------------- --}}

    <!-- Include links to external resources such as CSS files and JavaScript libraries. -->
    @include('layouts.links')

    {{-- ----------- Links ------------- --}}


</head>




    <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500 h-screen " >


        {{-- <div id="spinner" class="fixed top-0 left-0 h-screen w-screen flex justify-center items-center bg-gray-900 bg-opacity-50" style="z-index: 9999; transition: opacity 0.3s ease-in-out;">
            <div class="rounded-md p-4 w-full mx-auto" style="background-color:#f2f2f2">
              <div class="animate-pulse flex space-x-4">
                <div class="bg-white shadow-2xl bg-opacity-50 m-4 ml-10 mr-5 rounded-lg" style="width:15vw;height:90vh;"></div>
                <div class="flex-1 space-y-6 py-1">
                  <div class="h-20 rounded-lg bg-white shadow-lg bg-opacity-60"></div>
                  <div class="space-y-3">
                    <div class="grid grid-cols-3 gap-4">
                      <div class="bg-white shadow-xl bg-opacity-50 rounded-lg col-span-2 ml-10 mr-5" style="height: 30vh; width: 70vw;"></div>
                      <div class="bg-white shadow-xl bg-opacity-50 rounded-lg col-span-2 ml-10 mr-5" style="height: 20vh; width: 60vw;"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}







                                {{------------------------ Sidebar  ----------------------------------}}
                                        <!-- Include the main sidebar for the application. -->

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
                                            <!-- Create the main container for the application. -->
                                    <!-- Determine the language direction and include the appropriate sidebar -->

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
                                            <!-- Include the application navbar. -->
                            <!-- Determine the language direction and include the appropriate navbar -->

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
                <div class=" mx-auto sm:px-6 lg:px-8">
                    {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> --}}
                            @yield('Content')

                    {{-- </div> --}}
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


            {{-- @include('sweetalert::alert') --}}

            {{----------------------------------------------- Footer scripts  ----------------------------------------------------}}
        @include('layouts.footer-scripts')
            {{-------------------------------------------  End Footer scripts  ----------------------------------------------------}}



</body>





</html>
