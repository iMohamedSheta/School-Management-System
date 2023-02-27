    {{-- <aside id="aside" class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent"> --}}
    <aside id="aside" class="fixed inset-y-0 left-0 flex-wrap items-center justify-between block  p-0 my-4 transition-all duration-200 bg-white border-0 shadow-none xl:ml-4 dark:bg-gray-950 ease-soft-in-out z-990 rounded-2xl xl:translate-x-0 xl:bg-transparent ps ps--active-y -translate-x-full shadow-soft-xl max-w-24 overflow-hidden">
        <div class="h-19.5 grid">
            <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="{{route('master')}}" target="_blank">
            <img src={{asset("assets/img/logo-ct.png")}} class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
            <div id="sidebariconOnly1">
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand ">{{ config('app.name') }}</span>
            </div>
            </a>
        </div>

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap  px-4 font-semibold text-slate-700 transition-colors
                {{ Route::currentRouteName() == 'master' ? 'shadow-soft-xl rounded-lg bg-white ' : '' }}" href="{{route('master')}}">
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5
                {{ Route::currentRouteName() == "master" ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}">
                    <i class="fa-solid fa-house {{ Route::currentRouteName() == 'master' ? 'text-white' : ''}}"></i>
                </div>
                <div id="sidebariconOnly6">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.dashboard")}}</span>
                </div>
                </a>
            </li>


            <li class="mt-0.5 w-full" id="listopennavbar" >
                <a aria-controls="data-accordion-icon" data-collapse-toggle="data-accordion-icon" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap {{ (Route::currentRouteName()== 'welcome') ? 'shadow-soft-xl rounded-lg bg-white' : '' }} px-4 font-semibold text-slate-700 transition-colors" href="#">
                <div class="{{ Route::currentRouteName() == 'welcome' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-house {{ Route::currentRouteName() == 'welcome' ? 'text-white' : ''}}"></i>
                </div>
                <div id="sidebariconOnly2">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.classes")}}</span>
                    <i  id="arrowicon" class="fa-solid fa-chevron-down px-3  shrink-0"></i>
                </div>
                </a>
            </li>

            <ul  id="data-accordion-icon" class="hidden px-4 border-l-2 border-gray-400">

                            <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap {{ (Route::currentRouteName()== 'welcome') ? 'shadow-soft-xl rounded-lg bg-white' : '' }} px-4 font-semibold text-slate-700 transition-colors" href="../pages/dashboard.html">
                                <div class="{{ Route::currentRouteName() == 'welcome' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-house {{ Route::currentRouteName() == 'welcome' ? 'text-white' : ''}}"></i>
                                </div>
                                <div id="sidebariconOnly3">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.classes")}}</span>
                                </div>
                            </a>
                            </li>
                            <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap {{ (Route::currentRouteName()== 'welcome') ? 'shadow-soft-xl rounded-lg bg-white' : '' }} px-4 font-semibold text-slate-700 transition-colors" href="../pages/dashboard.html">
                                <div class="{{ Route::currentRouteName() == 'welcome' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-house {{ Route::currentRouteName() == 'welcome' ? 'text-white' : ''}}"></i>
                                </div>
                                <div id="sidebariconOnly4">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.classes")}}</span>
                                </div>
                            </a>
                            </li>
            </ul>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap {{ (Route::currentRouteName()== 'grade') ? 'shadow-soft-xl rounded-lg bg-white' : '' }} px-4 font-semibold text-slate-700 transition-colors" href="{{route('grade')}}">
                <div class="{{ Route::currentRouteName() == 'grade' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-award {{Route::currentRouteName() == 'grade' ? 'text-white' : ''}}"></i>
                </div>
                <div id="sidebariconOnly5">

                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.grades")}}</span>
                </div>
                </a>
            </li>




            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                 {{ (Route::currentRouteName()== 'profile.show') ? 'shadow-soft-xl rounded-lg bg-white' : '' }} px-4 font-semibold text-slate-700 transition-colors" href="{{route('profile.show')}}">
                <div class="{{ Route::currentRouteName() == 'profile.show' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-user {{Route::currentRouteName() == 'profile.show' ? 'text-white' : ''}}"></i>
                </div>
                <div id="sidebariconOnly7">

                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.profile")}}</span>
                </div>
                </a>
            </li>



            </ul>
        </div>


        </aside>

