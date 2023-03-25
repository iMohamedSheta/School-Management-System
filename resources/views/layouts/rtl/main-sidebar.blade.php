
        <!-- sidenav  -->
<aside id="aside" class="fixed  inset-y-0 right-0 flex-wrap  items-center justify-between inline-block fs:bg-white p-0 my-4 dash-translate-x-full duration-200 xs:bg-white border-0 shadow-none dark:bg-gray-950 ease-soft-in-out z-10 xl:mr-4 rounded-2xl xl:translate-x-0 xl:bg-transparent ps ps__rtl ps--active-y max-w-64 overflow-y-auto ">

    <div class="h-19.5 " >
        <i class="absolute top-0 left-0  p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="{{route('master')}}" target="_blank">
            <img src={{asset("assets/img/logo-ct.png")}} class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
            <div id="sidebariconOnly1" class="sidebar-icon inline-flex">
            <span class="mr-1 font-semibold transition-all duration-200 ease-nav-brand">{{config('app.name')}}</span>
            </div>
        </a>
        </div>

        <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />


        <div class="items-center block w-auto h-sidenav-no-pro grow basis-full" >
            <ul class="flex flex-col pl-0 mb-0 max-w-64 overflow-y-auto max-h-[calc(100vh-8rem)] " >

                <li class="mt-0.5 w-full ">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                    {{ Route::currentRouteName() == 'master' ? 'shadow-soft-xl rounded-lg bg-white ' : '' }}"
                        href="{{ route('master') }}">
                        <div
                        class="{{ Route::currentRouteName() == "master" ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-house {{ Route::currentRouteName() == "master" ? 'text-white' : 'text-gray-700'}}"></i>
                        </div>
                        <div id="sidebariconOnly2" class="sidebar-icon">
                            <span class=" mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.dashboard")}}</span>
                        </div>
                    </a>

                </li>

                <li class="w-full mt-2 ">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                        {{ (Route::currentRouteName()== 'profile.show') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="{{ route('profile.show') }}">
                        <div
                        class="{{ Route::currentRouteName() == 'profile.show' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-user {{Route::currentRouteName() == 'profile.show' ? 'text-white' : ''}}"></i>
                        </div>
                        <div id="sidebariconOnly3" class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.profile")}}</span></div>
                    </a>
                </li>
                <li class="w-full mt-2 ">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                        {{ in_array(Route::currentRouteName(),['posts.index','post.show']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="{{ route('posts.index') }}">
                        <div
                        class="{{ in_array(Route::currentRouteName(),['posts.index','post.show']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-cente? 'text-white' : ''r justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-pen-to-square {{ in_array(Route::currentRouteName(),['posts.index','post.show']) ? 'text-white' : ''}}"></i>
                        </div>
                        <div id="sidebariconOnly4" class="sidebar-icon"><span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.posts.index")}}</span></div>
                    </a>
                </li>

                @if(auth()->user()->isAdmin())
                <li class="w-full mt-2 ">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                        {{ (Route::currentRouteName()== 'user-role.index') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="{{ route('user-role.index') }}">
                        <div
                        class="{{ Route::currentRouteName() == 'user-role.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fas fa-user-shield {{Route::currentRouteName() == 'user-role.index' ? 'text-white' : ''}}"></i>
                        </div>
                        <div id="sidebariconOnly8" class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.roles")}}</span></div>
                    </a>
                </li>

                <li class="w-full mt-2 ">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                        {{ (Route::currentRouteName()== 'grade') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="{{ route('grade') }}">
                        <div
                        class="{{ Route::currentRouteName() == 'grade' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-graduation-cap {{Route::currentRouteName() == 'grade' ? 'text-white' : ''}}"></i>
                        </div>
                        <div id="sidebariconOnly10" class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.grades")}}</span></div>
                    </a>
                </li>

                <li class="w-full mt-2 ">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                        {{ (Route::currentRouteName()== "classrooms.index") ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="{{ route("classrooms.index") }}">
                        <div
                        class="{{ Route::currentRouteName() == 'classrooms.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fas fa-chalkboard-teacher {{Route::currentRouteName() == "classrooms.index" ? 'text-white' : ''}}"></i>
                        </div>
                        <div id="sidebariconOnly9" class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.classes")}}</span></div>
                    </a>
                </li>




                {{-- --------------------------------------------------------------------------------------------------- --}}
                <li class="w-full mt-2  listopennavbar" >
                    <a  id="listopennavbar" aria-controls="data-accordion-icon1" data-collapse-toggle="data-accordion-icon1" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                        whitespace-nowrap px-4 transition-colors font-semibold text-slate-700 {{  in_array(Route::currentRouteName(), ['register','users','users.add']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="#">
                        <div
                        class="{{ in_array(Route::currentRouteName(), ['register','users','users.add']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-users-gear {{  in_array(Route::currentRouteName(), ['register','users','users.add']) ?'text-white' : ''}}"></i>
                        </div>
                        <div id="sidebariconOnly13" class="sidebar-icon"> <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.users")}}</span>
                            <i  id="arrowicon" class="arrowicon fa-solid fa-chevron-down px-3  shrink-0 transition-transform duration-200"></i>
                        </div>
                        </a>

                        <ul  id="data-accordion-icon1" class="hidden px-4">
                            <div class="border-r-2 border-gray-400 ">
                                <li class="w-full mt-2 ">
                                    <a aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                                    whitespace-nowrap px-4 transition-colors font-semibold text-slate-700 {{ (Route::currentRouteName()== 'parent.add') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                        href="{{-- route('parent.add') --}}">
                                        <div
                                        class="{{ Route::currentRouteName() == 'parent.add' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                        <i class="fa-solid fa-users {{ Route::currentRouteName() == 'parent.add' ? 'text-white' : ''}}"></i>
                                        </div>
                                        <div id="sidebariconOnly12" class="sidebar-icon">
                                            <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.users")}}</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="w-full mt-2 ">
                                    <a aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                                    whitespace-nowrap px-4 transition-colors font-semibold text-slate-700 {{ (Route::currentRouteName()== 'users.add') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                        href="{{ route('users.add') }}">
                                        <div
                                        class="{{ Route::currentRouteName() == 'users.add' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                        <i class="fa-solid fa-user-pen {{ Route::currentRouteName() == 'users.add' ? 'text-white' : ''}}"></i>
                                        </div>
                                        <div id="sidebariconOnly11" class="sidebar-icon"> <span class="sidebariconOnly mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.register")}}</span></div>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </li>

    {{-- ------------------------------------------------------------------------------------------------------------------------------------- --}}


                    {{-- --------------------------------------------------------------------------------------------------- --}}
                    {{-- <li class="listopennavbar w-full mt-2 " id="listopennavbar" >
                        <a  aria-controls="data-accordion-icon" data-collapse-toggle="data-accordion-icon" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                            whitespace-nowrap px-4 transition-colors font-semibold text-slate-700 {{  in_array(Route::currentRouteName(), ['parent.index', 'parent.add']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="#">
                            <div
                            class="{{ in_array(Route::currentRouteName(), ['parent.index', 'parent.add']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-house {{  in_array(Route::currentRouteName(), ['parent.index', 'parent.add']) ?'text-white' : ''}}"></i>
                            </div>
                            <div id="sidebariconOnly7" class="sidebar-icon"> <span class=" mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.parent")}}</span>
                                <i  id="arrowicon" class="arrowicon fa-solid fa-chevron-down px-3  shrink-0 transition-transform duration-200"></i>
                            </div>
                            </a>

                            <ul  id="data-accordion-icon" class="hidden px-4">
                                <div class="border-r-2 border-gray-400 ">
                                <li class="w-full mt-2 ">
                                    <a aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                                    whitespace-nowrap px-4 transition-colors font-semibold text-slate-700 {{ (Route::currentRouteName()== 'parent.index') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                        href="">
                                        <div
                                        class="{{ Route::currentRouteName() == 'parent.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                        <i class="fa-solid fa-house {{ Route::currentRouteName() == 'parent.index' ? 'text-white' : ''}}"></i>
                                        </div>
                                        <div id="sidebariconOnly5" class="sidebar-icon"> <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.parent")}}</span></div>
                                    </a>
                                </li>
                                <li class="w-full mt-2 ">
                                    <a aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                                    whitespace-nowrap px-4 transition-colors font-semibold text-slate-700 {{ (Route::currentRouteName()== 'parent.add') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                        href="{{ route('users.add') }}">
                                        <div
                                        class="{{ Route::currentRouteName() == 'parent.add' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                        <i class="fa-solid fa-house {{ Route::currentRouteName() == 'parent.add' ? 'text-white' : ''}}"></i>
                                        </div>
                                        <div id="sidebariconOnly6" class="sidebar-icon">
                                            <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.parent.add")}}</span>
                                        </div>
                                    </a>
                                </li>
                                </div>
                            </ul>
                        </li> --}}

        {{-- ------------------------------------------------------------------------------------------------------------------------------------- --}}
                        @endif


            </ul>
        </div>


</aside>



    {{-- End SideBar --}}
