<aside id="aside" class="fixed inset-y-0 left-0 flex-wrap items-center justify-between block p-0 my-4 transition-all duration-200 bg-white border-0 shadow-none xl:ml-4 dark:bg-gray-950 ease-soft-in-out z-20 rounded-2xl xl:translate-x-0 xl:bg-transparent ps ps--active-y -translate-x-full shadow-soft-xl max-w-24 overflow-hidden ">
    <div class="h-19.5 grid">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="{{route('master')}}" target="_blank">
            <img src={{asset("assets/img/logo-ct.png")}} class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
            <div id="sidebariconOnly1" class="sidebar-icon">
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand ">{{ config('app.name') }}</span>
            </div>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-screen  h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0 max-w-64 overflow-y-auto max-h-[calc(100vh-8rem)] ">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap  px-4 font-semibold text-slate-700 transition-colors
                    {{ Route::currentRouteName() == 'master' ? 'shadow-soft-xl rounded-lg bg-white ' : '' }}" href="{{route('master')}}">
                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5
                        {{ Route::currentRouteName() == "master" ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}">
                        <i class="fa-solid fa-house {{ Route::currentRouteName() == 'master' ? 'text-white' : ''}}"></i>
                    </div>
                    <div id="sidebariconOnly6" class="sidebar-icon">
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.dashboard")}}</span>
                    </div>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                {{ (Route::currentRouteName()== 'profile.show') ? 'shadow-soft-xl rounded-lg bg-white' : '' }} px-4 font-semibold text-slate-700 transition-colors" href="{{route('profile.show')}}">
                <div class="{{ Route::currentRouteName() == 'profile.show' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fas fa-user-shield  {{Route::currentRouteName() == 'profile.show' ? 'text-white' : ''}}"></i>
                </div>
                <div id="sidebariconOnly7" class="sidebar-icon">

                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.profile")}}</span>
                </div>
                </a>
            </li>


            @if(auth()->user()->isAdmin())

            <li class="mt-0.5 w-full" id="listopennavbar">
                <a aria-controls="data-accordion-icon1" data-collapse-toggle="data-accordion-icon1" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                {{  in_array(Route::currentRouteName(), ['register','users','users.add','user-role.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                    px-4 font-semibold text-slate-700 transition-colors" href="#">

                <div class="{{ in_array(Route::currentRouteName(), ['register','users','users.add','user-role.index']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-users-gear {{  in_array(Route::currentRouteName(), ['register','users','users.add','user-role.index']) ?'text-white' : ''}}"></i>
                </div>
                <div id="sidebariconOnly2" class="sidebar-icon">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.users")}}</span>
                    <i  id="arrowicon" class="fa-solid fa-chevron-down px-3  shrink-0"></i>
                </div>
                </a>
                    <ul  id="data-accordion-icon1" class="hidden px-4 border-l-2 border-gray-400">

                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'users.add') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors" href="{{ route('users.add') }}">
                                <div class="{{ Route::currentRouteName() == 'users.add' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-user-pen {{ Route::currentRouteName() == 'users.add' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.register")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'user-role.index') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors" href="{{ route('user-role.index') }}">
                                <div class="{{ Route::currentRouteName() == 'user-role.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fas fa-user-shield {{ Route::currentRouteName() == 'user-role.index' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.roles")}}</span>
                                </div>
                            </a>
                        </li>

                    </ul>
            </li>

            <li class="mt-0.5 w-full" id="listopennavbar">
                <a aria-controls="data-accordion-icon2" data-collapse-toggle="data-accordion-icon2" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                {{ in_array(Route::currentRouteName(),['students.index','student.info','student.edit',
                'student.email.edit','students.promotions.table','students.promotions.classroom','students.graduated.table',
                'students.graduations.classroom']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                    px-4 font-semibold text-slate-700 transition-colors" href="#">

                <div class="{{ in_array(Route::currentRouteName(),['students.index','student.info','student.edit','student.email.edit','students.promotions.table',
                'students.promotions.classroom','students.graduated.table','students.graduations.classroom']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}
                shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-chalkboard-user fa-sharp {{ in_array(Route::currentRouteName(),['students.index','student.info','student.edit','student.email.edit','students.promotions.table',
                    'students.promotions.classroom','students.graduated.table','students.graduations.classroom']) ?'text-white' : ''}}"></i>
                </div>
                <div id="sidebariconOnly2" class="sidebar-icon">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.students")}}</span>
                    <i  id="arrowicon" class="fa-solid fa-chevron-down px-3  shrink-0"></i>
                </div>
                </a>
                    <ul  id="data-accordion-icon2" class="hidden px-4 border-l-2 border-gray-400">

                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ in_array(Route::currentRouteName(),['students.index','student.info','student.edit','student.email.edit']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors"
                                href="{{ route('students.index') }}">
                                <div class="{{ in_array(Route::currentRouteName(),['students.index','student.info','student.edit','student.email.edit']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-chalkboard-user fa-sharp {{ in_array(Route::currentRouteName(),['students.index','student.info','student.edit','student.email.edit']) ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.students")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'students.promotions.table') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors"
                                href="{{ route('students.promotions.table') }}">
                                <div class="{{ Route::currentRouteName() == 'students.promotions.table' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-file-arrow-up fa-lg {{ Route::currentRouteName() == 'students.promotions.table' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.students.promotions.index")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'students.promotions.classroom') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors"
                                href="{{ route('students.promotions.classroom') }}">
                                <div class="{{ Route::currentRouteName() == 'students.promotions.classroom' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-arrow-up-wide-short fa-lg {{ Route::currentRouteName() == 'students.promotions.classroom' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.students.promotions.classroom")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'students.graduated.table') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors"
                                href="{{ route('students.graduated.table') }}">
                                <div class="{{ Route::currentRouteName() == 'students.graduated.table' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-user-graduate fa-lg  {{ Route::currentRouteName() == 'students.graduated.table' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.students.graduated.table")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'students.graduations.classroom') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors"
                                href="{{ route('students.graduations.classroom') }}">
                                <div class="{{ Route::currentRouteName() == 'students.graduations.classroom' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-graduation-cap fa-lg  {{ Route::currentRouteName() == 'students.graduations.classroom' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.students.graduations.classroom")}}</span>
                                </div>
                            </a>
                        </li>

                    </ul>
            </li>

            <li class="mt-0.5 w-full" id="listopennavbar">
                <a aria-controls="data-accordion-icon7" data-collapse-toggle="data-accordion-icon7" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                {{  in_array(Route::currentRouteName(),['teachers.index','teacher.info','teacher.edit','teacher.email.edit','teacher.assign.classroom','teachers.classrooms']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                    px-4 font-semibold text-slate-700 transition-colors" href="#">

                <div class="{{ in_array(Route::currentRouteName(),['teachers.index','teacher.info','teacher.edit','teacher.email.edit','teacher.assign.classroom','teachers.classrooms']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-person-chalkboard {{  in_array(Route::currentRouteName(),['teachers.index','teacher.info','teacher.edit','teacher.email.edit','teacher.assign.classroom','teachers.classrooms']) ?'text-white' : ''}}"></i>
                </div>
                <div id="sidebariconOnly" class="sidebar-icon">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.teachers")}}</span>
                    <i  id="arrowicon" class="fa-solid fa-chevron-down px-3  shrink-0"></i>
                </div>
                </a>
                    <ul  id="data-accordion-icon7" class="hidden px-4 border-l-2 border-gray-400">

                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ in_array(Route::currentRouteName(),['teachers.index','teacher.info','teacher.edit','teacher.email.edit']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors" href="{{ route('teachers.index') }}">
                                <div class="{{ in_array(Route::currentRouteName(),['teachers.index','teacher.info','teacher.edit','teacher.email.edit']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-person-chalkboard {{ in_array(Route::currentRouteName(),['teachers.index','teacher.info','teacher.edit','teacher.email.edit']) ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.teachers")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ in_array(Route::currentRouteName(),['teachers.classrooms']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors" href="{{ route('teachers.classrooms') }}">
                                <div class="{{ in_array(Route::currentRouteName(),['teachers.classrooms']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fas fa-chalkboard-teacher {{ in_array(Route::currentRouteName(),['teachers.classrooms']) ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.teachers.classrooms")}}</span>
                                </div>
                            </a>
                        </li>

                    </ul>
            </li>


            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                {{ in_array(Route::currentRouteName(),['parents.index','parent.info','parent.edit','parent.email.edit'])  ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                px-4 font-semibold text-slate-700 transition-colors"
                href="{{route('parents.index')}}">
                <div class="{{ in_array(Route::currentRouteName(),['parents.index','parent.info','parent.edit','parent.email.edit']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid  fa-user-group  {{ in_array(Route::currentRouteName(),['parents.index','parent.info','parent.edit','parent.email.edit']) ? 'text-white' : '' }}"></i>
                </div>
                <div  class="sidebar-icon">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans('main-sidebar.parents')}}</span>
                </div>
                </a>
            </li>


            <li class="mt-0.5 w-full" id="listopennavbar">
                <a aria-controls="data-accordion-icon3" data-collapse-toggle="data-accordion-icon3" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                {{ in_array(Route::currentRouteName(),['fees.index','fee.info','fee.edit','fee.create','fees.types.index','feesinvoices.index','receipts.index','processingfees.index','payments.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                    px-4 font-semibold text-slate-700 transition-colors" href="#">

                <div class="{{ in_array(Route::currentRouteName(),['fees.index','fee.info','fee.edit','fee.create','fees.types.index','feesinvoices.index','receipts.index','processingfees.index','payments.index']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}
                shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-landmark fa-lg
                    {{ in_array(Route::currentRouteName(),['fees.index','fee.info','fee.edit','fee.create','fees.types.index','feesinvoices.index','receipts.index','processingfees.index','payments.index']) ?'text-white' : ''}}"></i>
                </div>
                <div  class="sidebar-icon">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.financial_accounts")}}</span>
                    <i  id="arrowicon" class="fa-solid fa-chevron-down px-3  shrink-0"></i>
                </div>
                </a>
                    <ul  id="data-accordion-icon3" class="hidden px-4 border-l-2 border-gray-400">

                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ in_array(Route::currentRouteName(),['fees.index','fee.info','fee.edit']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors"
                                href="{{ route('fees.index') }}">
                                <div class="{{ in_array(Route::currentRouteName(),['fees.index','fee.info','fee.edit']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-file-invoice fa-lg {{ in_array(Route::currentRouteName(),['fees.index','fee.info','fee.edit']) ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.fees.index")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'fee.create') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors"
                                href="{{ route('fee.create') }}">
                                <div class="{{ Route::currentRouteName() == 'fee.create' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-file-circle-plus fa-lg {{ Route::currentRouteName() == 'fee.create' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.fee.create")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'fees.types.index') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors"
                                href="{{ route('fees.types.index') }}">
                                <div class="{{ Route::currentRouteName() == 'fees.types.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-thumbtack fa-lg  {{ Route::currentRouteName() == 'fees.types.index' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.fees.types.index")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'feesinvoices.index') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors"
                                href="{{ route('feesinvoices.index') }}">
                                <div class="{{ Route::currentRouteName() == 'feesinvoices.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-sharp fa-solid fa-file-invoice-dollar fa-lg  {{ Route::currentRouteName() == 'feesinvoices.index' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.feesinvoices.index")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'receipts.index') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors"
                                href="{{ route('receipts.index') }}">
                                <div class="{{ Route::currentRouteName() == 'receipts.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-sharp fa-solid fa-receipt fa-lg  {{ Route::currentRouteName() == 'receipts.index' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.receipts.index")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'payments.index') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors"
                                href="{{ route('payments.index') }}">
                                <div class="{{ Route::currentRouteName() == 'payments.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-sharp fa-solid fa-money-bills fa-lg  {{ Route::currentRouteName() == 'payments.index' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.payments.index")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'processingfees.index') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors"
                                href="{{ route('processingfees.index') }}">
                                <div class="{{ Route::currentRouteName() == 'processingfees.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-sharp fa-solid fa-hand-holding-dollar fa-lg  {{ Route::currentRouteName() == 'processingfees.index' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.processingfees.index")}}</span>
                                </div>
                            </a>
                        </li>

                    </ul>
            </li>


            <li class="mt-0.5 w-full" id="listopennavbar">
                <a aria-controls="data-accordion-icon4" data-collapse-toggle="data-accordion-icon4" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                {{   in_array(Route::currentRouteName(),['subjects.index','subjects.create']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                    px-4 font-semibold text-slate-700 transition-colors" href="#">

                <div class="{{  in_array(Route::currentRouteName(),['subjects.index','subjects.create']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-book fa-lg {{   in_array(Route::currentRouteName(),['subjects.index','subjects.create']) ?'text-white' : ''}}"></i>
                </div>
                <div id="sidebariconOnly2" class="sidebar-icon">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.subjects.index")}}</span>
                    <i  id="arrowicon" class="fa-solid fa-chevron-down px-3  shrink-0"></i>
                </div>
                </a>
                    <ul  id="data-accordion-icon4" class="hidden px-4 border-l-2 border-gray-400">

                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ in_array(Route::currentRouteName(),['subjects.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors" href="{{ route('subjects.index') }}">
                                <div class="{{ Route::currentRouteName() == 'subjects.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-book fa-lg {{ Route::currentRouteName() == 'subjects.index' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.subjects.index")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'subjects.create') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors" href="{{ route('subjects.create') }}">
                                <div class="{{ Route::currentRouteName() == 'subjects.create' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-book-open fa-lg {{ Route::currentRouteName() == 'subjects.create' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.subjects.create")}}</span>
                                </div>
                            </a>
                        </li>

                    </ul>
            </li>

            @endif

            @if(auth()->user()->isAdmin() || auth()->user()->isTeacher())

            <li class="mt-0.5 w-full" id="listopennavbar">
                <a aria-controls="data-accordion-icon5" data-collapse-toggle="data-accordion-icon5" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                {{   in_array(Route::currentRouteName(),['exams.index','exams.create']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                    px-4 font-semibold text-slate-700 transition-colors" href="#">

                <div class="{{  in_array(Route::currentRouteName(),['exams.index','exams.create']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-book fa-lg {{   in_array(Route::currentRouteName(),['exams.index','exams.create']) ?'text-white' : ''}}"></i>
                </div>
                <div  class="sidebar-icon">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.exams.index")}}</span>
                    <i  id="arrowicon" class="fa-solid fa-chevron-down px-3  shrink-0"></i>
                </div>
                </a>
                    <ul  id="data-accordion-icon5" class="hidden px-4 border-l-2 border-gray-400">

                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ in_array(Route::currentRouteName(),['exams.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors" href="{{ route('exams.index') }}">
                                <div class="{{ Route::currentRouteName() == 'exams.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-book fa-lg {{ Route::currentRouteName() == 'exams.index' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.exams.index")}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="mt-0.5 w-full">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                            {{ (Route::currentRouteName()== 'exams.create') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                px-4 font-semibold text-slate-700 transition-colors" href="{{ route('exams.create') }}">
                                <div class="{{ Route::currentRouteName() == 'exams.create' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-book-open fa-lg {{ Route::currentRouteName() == 'exams.create' ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">
                                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.exams.create")}}</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                    {{ in_array(Route::currentRouteName(),['attendances.index','attendance.classroom']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }} px-4 font-semibold text-slate-700 transition-colors"
                        href="{{route("attendances.index")}}">
                    <div class="{{ in_array(Route::currentRouteName(),['attendances.index','attendance.classroom']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-clipboard-user fa-lg  {{in_array(Route::currentRouteName(),['attendances.index','attendance.classroom']) ? 'text-white' : ''}}"></i>
                    </div>
                    <div  class="sidebar-icon">
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.attendances.index")}}</span>
                    </div>
                    </a>
                </li>


                <li class="mt-0.5 w-full" id="listopennavbar">
                    <a aria-controls="data-accordion-icon6" data-collapse-toggle="data-accordion-icon6" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                    {{  in_array(Route::currentRouteName(),['meetings.index','meetings.create']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                        px-4 font-semibold text-slate-700 transition-colors" href="#">

                    <div class="{{ in_array(Route::currentRouteName(),['meetings.index','meetings.create']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}  shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="sheta sheta-zoom-app text-2xl {{ in_array(Route::currentRouteName(),['meetings.index','meetings.create']) ?'text-white' : ''}}"></i>
                    </div>
                    <div  class="sidebar-icon">
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.meetings.index")}}</span>
                        <i  id="arrowicon" class="fa-solid fa-chevron-down px-3  shrink-0"></i>
                    </div>
                    </a>
                        <ul  id="data-accordion-icon6" class="hidden px-4 border-l-2 border-gray-400">

                            <li class="mt-0.5 w-full">
                                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                                {{ in_array(Route::currentRouteName(),['meetings.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                    px-4 font-semibold text-slate-700 transition-colors" href="{{ route('meetings.index') }}">
                                    <div class="{{ Route::currentRouteName() == 'meetings.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="fa-brands fa-readme text-xl {{ Route::currentRouteName() == 'meetings.index' ? 'text-white' : ''}}"></i>
                                    </div>
                                    <div  class="sidebar-icon">
                                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.meetings.index")}}</span>
                                    </div>
                                </a>
                            </li>
                            <li class="mt-0.5 w-full">
                                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                                {{ (Route::currentRouteName()== 'meetings.create') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}
                                    px-4 font-semibold text-slate-700 transition-colors" href="{{ route('meetings.create') }}">
                                    <div class="{{ Route::currentRouteName() == 'meetings.create' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                    <i class="sheta sheta-zoom-app text-2xl {{ Route::currentRouteName() == 'meetings.create' ? 'text-white' : ''}}"></i>
                                    </div>
                                    <div  class="sidebar-icon">
                                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.meetings.create")}}</span>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    @endif

        @if(!auth()->user()->isParent())
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap {{ in_array(Route::currentRouteName(),['posts.index','post.show']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }} px-4 font-semibold text-slate-700 transition-colors" href="{{route('posts.index')}}">
                <div class="{{ in_array(Route::currentRouteName(),['posts.index','post.show']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-pen-to-square fa-lg {{in_array(Route::currentRouteName(),['posts.index','post.show']) ? 'text-white' : ''}}"></i>
                </div>
                <div  class="sidebar-icon">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.posts.index")}}</span>
                </div>
                </a>
            </li>
        @endif


        @if(auth()->user()->isAdmin())
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap {{ (Route::currentRouteName()== 'grade') ? 'shadow-soft-xl rounded-lg bg-white' : '' }} px-4 font-semibold text-slate-700 transition-colors" href="{{route('grade')}}">
                <div class="{{ Route::currentRouteName() == 'grade' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-graduation-cap {{Route::currentRouteName() == 'grade' ? 'text-white' : ''}}"></i>
                </div>
                <div  class="sidebar-icon">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.grades")}}</span>
                </div>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap
                {{ (Route::currentRouteName()== "classrooms.index") ? 'shadow-soft-xl rounded-lg bg-white' : '' }} px-4 font-semibold text-slate-700 transition-colors" href="{{route("classrooms.index")}}">
                <div class="{{ Route::currentRouteName() == "classrooms.index" ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fas fa-chalkboard-teacher  {{Route::currentRouteName() == "classrooms.index" ? 'text-white' : ''}}"></i>
                </div>
                <div class="sidebar-icon">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.classes")}}</span>
                </div>
                </a>
            </li>

            @endif


            @if(auth()->user()->isTeacher())
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap {{ in_array(Route::currentRouteName(),['teacher.classrooms','student.info']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }} px-4 font-semibold text-slate-700 transition-colors" href="{{route('teacher.classrooms')}}">
                <div class="{{ in_array(Route::currentRouteName(),['teacher.classrooms','student.info']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-pen-to-square fa-lg {{ in_array(Route::currentRouteName(),['teacher.classrooms','student.info']) ? 'text-white' : ''}}"></i>
                </div>
                <div  class="sidebar-icon">
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.teacher.classrooms")}}</span>
                </div>
                </a>
            </li>
            @endif



        </ul>
    </div>


</aside>

