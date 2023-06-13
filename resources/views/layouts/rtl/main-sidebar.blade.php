
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


        <div class="items-center block w-auto h-sidenav-no-pro grow basis-full " >
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
                @if(auth()->user()->isAdmin())

                                {{-- --------------------------------------------------------------------------------------------------- --}}
                <li class="w-full mt-2  listopennavbar" >
                    <a  id="listopennavbar" aria-controls="data-accordion-icon1" data-collapse-toggle="data-accordion-icon1" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                        whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                        {{  in_array(Route::currentRouteName(), ['register','users','users.add','user-role.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="#">
                        <div
                        class="{{ in_array(Route::currentRouteName(), ['register','users','users.add','user-role.index']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-users-gear {{  in_array(Route::currentRouteName(), ['register','users','users.add','user-role.index']) ?'text-white' : ''}}"></i>
                        </div>
                        <div id="sidebariconOnly13" class="sidebar-icon"> <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.users")}}</span>
                            <i  id="arrowicon" class="arrowicon fa-solid fa-chevron-down px-3  shrink-0 transition-transform duration-200"></i>
                        </div>
                        </a>

                        <ul  id="data-accordion-icon1" class="hidden px-4">
                            <div class="border-x-2 border-b rounded-xl border-gray-400  bg-gray-100 py-2">


                                <li class="w-full mt-2 ">
                                    <a aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                                    whitespace-nowrap px-4 transition-colors font-semibold text-slate-700 {{ (Route::currentRouteName()== 'users.add') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                        href="{{ route('users.add') }}">
                                        <div
                                        class="{{ Route::currentRouteName() == 'users.add' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                        <i class="fa-solid fa-user-pen {{ Route::currentRouteName() == 'users.add' ? 'text-white' : ''}}"></i>
                                        </div>
                                        <div class="sidebar-icon"> <span class="sidebariconOnly mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.register")}}</span></div>
                                    </a>
                                </li>
                                <li class="w-full mt-2 ">
                                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                                        {{ (Route::currentRouteName()== 'user-role.index') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                        href="{{ route('user-role.index') }}">
                                        <div
                                        class="{{ Route::currentRouteName() == 'user-role.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                        <i class="fas fa-user-shield {{Route::currentRouteName() == 'user-role.index' ? 'text-white' : ''}}"></i>
                                        </div>
                                        <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.roles")}}</span></div>
                                    </a>
                                </li>

                            </div>
                        </ul>
                    </li>


    {{-- ------------------------------------------------------------------------------------------------------------------------------------- --}}
    <li class="w-full mt-2  listopennavbar " >
        <a  id="listopennavbar" aria-controls="data-accordion-icon2" data-collapse-toggle="data-accordion-icon2" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
            whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
            {{ in_array(Route::currentRouteName(),['students.index','student.info','student.edit','student.email.edit','students.promotions.table','students.promotions.classroom','students.graduated.table','students.graduations.classroom']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
            href="#">
            <div
            class="{{ in_array(Route::currentRouteName(),['students.index','student.info','student.edit','student.email.edit','students.promotions.table','students.promotions.classroom','students.graduated.table','students.graduations.classroom']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
            <i class="fa-solid fa-chalkboard-user fa-sharp {{in_array(Route::currentRouteName(),['students.index','student.info','student.edit','student.email.edit','students.promotions.table','students.promotions.classroom','students.graduated.table','students.graduations.classroom']) ? 'text-white' : ''}}"></i>
        </div>
            <div id="sidebariconOnly13" class="sidebar-icon"> <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.students")}}</span>
                <i  id="arrowicon" class="arrowicon fa-solid fa-chevron-down px-3  shrink-0 transition-transform duration-200"></i>
            </div>
            </a>

            <ul  id="data-accordion-icon2" class="hidden px-4  transition duration-1000  ">
                <div class="border-x-2 border-b rounded-xl border-gray-400  bg-gray-100 py-2">

                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['students.index','student.info','student.edit','student.email.edit']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('students.index') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['students.index','student.info','student.edit','student.email.edit']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-chalkboard-user fa-sharp {{in_array(Route::currentRouteName(),['students.index','student.info','student.edit','student.email.edit']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.students")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['students.promotions.table']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('students.promotions.table') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['students.promotions.table']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-file-arrow-up fa-lg {{in_array(Route::currentRouteName(),['students.promotions.table']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.students.promotions.index")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['students.promotions.classroom']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('students.promotions.classroom') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['students.promotions.classroom']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-arrow-up-wide-short fa-lg {{in_array(Route::currentRouteName(),['students.promotions.classroom']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.students.promotions.classroom")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['students.graduated.table']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('students.graduated.table') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['students.graduated.table']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-user-graduate fa-lg  {{in_array(Route::currentRouteName(),['students.graduated.table']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.students.graduated.table")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['students.graduations.classroom']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('students.graduations.classroom') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['students.graduations.classroom']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-graduation-cap fa-lg  {{in_array(Route::currentRouteName(),['students.graduations.classroom']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.students.graduations.classroom")}}</span></div>
                        </a>
                    </li>


                </div>
            </ul>
        </li>

        <li class="w-full mt-2  listopennavbar" >
            <a  id="listopennavbar" aria-controls="data-accordion-icon7" data-collapse-toggle="data-accordion-icon7" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                {{in_array(Route::currentRouteName(),['teachers.index','teacher.info','teacher.edit','teacher.email.edit','teacher.assign.classroom','teachers.classrooms']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                href="#">
                <div
                class="{{ in_array(Route::currentRouteName(),['teachers.index','teacher.info','teacher.edit','teacher.email.edit','teacher.assign.classroom','teachers.classrooms']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <i class="fa-solid fa-person-chalkboard {{ in_array(Route::currentRouteName(),['teachers.index','teacher.info','teacher.edit','teacher.email.edit','teacher.assign.classroom','teachers.classrooms']) ?'text-white' : ''}}"></i>
                </div>
                <div id="sidebariconOnly13" class="sidebar-icon"> <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.teachers")}}</span>
                    <i  id="arrowicon" class="arrowicon fa-solid fa-chevron-down px-3  shrink-0 transition-transform duration-200"></i>
                </div>
                </a>

                <ul  id="data-accordion-icon7" class="hidden px-4">
                    <div class="border-x-2 border-b rounded-xl border-gray-400  bg-gray-100 py-2">

                        <li class="w-full mt-2 ">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                                {{ in_array(Route::currentRouteName(),['teachers.index','teacher.info','teacher.edit','teacher.email.edit']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                href="{{ route('teachers.index') }}">
                                <div
                                class="{{ in_array(Route::currentRouteName(),['teachers.index','teacher.info','teacher.edit','teacher.email.edit']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fa-solid fa-person-chalkboard  {{in_array(Route::currentRouteName(),['teachers.index','teacher.info','teacher.edit','teacher.email.edit']) ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.teachers")}}</span></div>
                            </a>
                        </li>
                        <li class="w-full mt-2 ">
                            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                                {{ in_array(Route::currentRouteName(),['teachers.classrooms']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                href="{{ route('teachers.classrooms') }}">
                                <div
                                class="{{ in_array(Route::currentRouteName(),['teachers.classrooms']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                <i class="fas fa-chalkboard-teacher {{ in_array(Route::currentRouteName(),['teachers.classrooms']) ? 'text-white' : ''}}"></i>
                                </div>
                                <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.teachers.classrooms")}}</span></div>
                            </a>
                        </li>

                    </div>
                </ul>
            </li>



                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['parents.index','parent.info','parent.edit','parent.email.edit']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('parents.index') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['parents.index','parent.info','parent.edit','parent.email.edit']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid  fa-user-group  {{in_array(Route::currentRouteName(),['parents.index','parent.info','parent.edit','parent.email.edit']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.parents")}}</span></div>
                        </a>
                    </li>


            <li class="w-full mt-2  listopennavbar " >
                <a  id="listopennavbar" aria-controls="data-accordion-icon3" data-collapse-toggle="data-accordion-icon3" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                    whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                    {{ in_array(Route::currentRouteName(),['fees.index','fee.info','fee.edit','fee.create','fees.types.index','feesinvoices.index','receipts.index','processingfees.index','payments.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                    href="#">
                    <div
                    class="{{ in_array(Route::currentRouteName(),['fees.index','fee.info','fee.edit','fee.create','fees.types.index','feesinvoices.index','receipts.index','processingfees.index','payments.index']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fa-solid fa-landmark fa-lg {{in_array(Route::currentRouteName(),['fees.index','fee.info','fee.edit','fee.create','fees.types.index','feesinvoices.index','receipts.index','processingfees.index','payments.index']) ? 'text-white' : ''}}"></i>
                </div>
                    <div id="sidebariconOnly13" class="sidebar-icon"> <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.financial_accounts")}}</span>
                        <i  id="arrowicon" class="arrowicon fa-solid fa-chevron-down px-3  shrink-0 transition-transform duration-200"></i>
                    </div>
                    </a>

                    <ul  id="data-accordion-icon3" class="hidden px-4  transition duration-1000  ">
                        <div class="border-x-2 border-b rounded-xl border-gray-400  bg-gray-100 py-2">

                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['fees.index','fee.info','fee.edit']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('fees.index') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['fees.index','fee.info','fee.edit']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-file-invoice fa-lg {{in_array(Route::currentRouteName(),['fees.index','fee.info','fee.edit']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.fees.index")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['fee.create']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('fee.create') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['fee.create']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-file-circle-plus fa-lg  {{in_array(Route::currentRouteName(),['fee.create']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.fee.create")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['fees.types.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('fees.types.index') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['fees.types.index']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-thumbtack fa-lg  {{in_array(Route::currentRouteName(),['fees.types.index']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.fees.types.index")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['feesinvoices.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('feesinvoices.index') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['feesinvoices.index']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-sharp fa-solid fa-file-invoice-dollar fa-lg {{in_array(Route::currentRouteName(),['feesinvoices.index']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.feesinvoices.index")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['receipts.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('receipts.index') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['receipts.index']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-sharp fa-solid fa-receipt fa-lg {{in_array(Route::currentRouteName(),['receipts.index']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.receipts.index")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['payments.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('payments.index') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['payments.index']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-sharp fa-solid fa-money-bills fa-lg {{in_array(Route::currentRouteName(),['payments.index']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.payments.index")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['processingfees.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('processingfees.index') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['processingfees.index']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-sharp fa-solid fa-hand-holding-dollar fa-lg {{in_array(Route::currentRouteName(),['processingfees.index']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.processingfees.index")}}</span></div>
                        </a>
                    </li>

                </div>
            </ul>
        </li>

                <li class="w-full mt-2  listopennavbar " >
                    <a  id="listopennavbar" aria-controls="data-accordion-icon4" data-collapse-toggle="data-accordion-icon4" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                        whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                        {{ in_array(Route::currentRouteName(),['subjects.index','subjects.create','subjects.associate.classroom']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="#">
                        <div
                        class="{{ in_array(Route::currentRouteName(),['subjects.index','subjects.create','subjects.associate.classroom']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-book fa-lg {{in_array(Route::currentRouteName(),['subjects.index','subjects.create','subjects.associate.classroom']) ? 'text-white' : ''}}"></i>
                    </div>
                        <div id="sidebariconOnly13" class="sidebar-icon"> <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.subjects.index")}}</span>
                            <i  id="arrowicon" class="arrowicon fa-solid fa-chevron-down px-3  shrink-0 transition-transform duration-200"></i>
                        </div>
                        </a>

                        <ul  id="data-accordion-icon4" class="hidden px-4  transition duration-1000  ">
                            <div class="border-x-2 border-b rounded-xl border-gray-400  bg-gray-100 py-2">

                                <li class="w-full mt-2 ">
                                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                                        {{ in_array(Route::currentRouteName(),['subjects.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                        href="{{ route('subjects.index') }}">
                                        <div
                                        class="{{ in_array(Route::currentRouteName(),['subjects.index']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                        <i class="fa-solid fa-book fa-lg {{ in_array(Route::currentRouteName(),['subjects.index']) ? 'text-white' : ''}}"></i>
                                        </div>
                                        <div  class="sidebar-icon"><span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.subjects.index")}}</span></div>
                                    </a>
                                </li>
                                <li class="w-full mt-2 ">
                                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                                        {{ in_array(Route::currentRouteName(),['subjects.create']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                        href="{{ route('subjects.create') }}">
                                        <div
                                        class="{{ in_array(Route::currentRouteName(),['subjects.create']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                        <i class="fa-solid fa-book-open fa-lg {{ in_array(Route::currentRouteName(),['subjects.create']) ? 'text-white' : ''}}"></i>
                                        </div>
                                        <div  class="sidebar-icon"><span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.subjects.create")}}</span></div>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </li>
                    @endif
                    @if(auth()->user()->isAdmin() || auth()->user()->isTeacher())

                <li class="w-full mt-2  listopennavbar " >
                    <a  id="listopennavbar" aria-controls="data-accordion-icon5" data-collapse-toggle="data-accordion-icon5" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                        whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                        {{ in_array(Route::currentRouteName(),['exams.index','exams.create']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="#">
                        <div
                        class="{{ in_array(Route::currentRouteName(),['exams.index','exams.create']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-book fa-lg {{in_array(Route::currentRouteName(),['exams.index','exams.create']) ? 'text-white' : ''}}"></i>
                    </div>
                        <div id="sidebariconOnly13" class="sidebar-icon"> <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.exams.index")}}</span>
                            <i  id="arrowicon" class="arrowicon fa-solid fa-chevron-down px-3  shrink-0 transition-transform duration-200"></i>
                        </div>
                        </a>

                        <ul  id="data-accordion-icon5" class="hidden px-4  transition duration-1000  ">
                            <div class="border-x-2 border-b rounded-xl border-gray-400  bg-gray-100 py-2">

                                <li class="w-full mt-2 ">
                                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                                        {{ in_array(Route::currentRouteName(),['exams.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                        href="{{ route('exams.index') }}">
                                        <div
                                        class="{{ in_array(Route::currentRouteName(),['exams.index']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                        <i class="fa-solid fa-book fa-lg {{ in_array(Route::currentRouteName(),['exams.index']) ? 'text-white' : ''}}"></i>
                                        </div>
                                        <div  class="sidebar-icon"><span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.exams.index")}}</span></div>
                                    </a>
                                </li>
                                <li class="w-full mt-2 ">
                                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                                        {{ in_array(Route::currentRouteName(),['exams.create']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                        href="{{ route('exams.create') }}">
                                        <div
                                        class="{{ in_array(Route::currentRouteName(),['exams.create']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                        <i class="fa-solid fa-book fa-lg {{ in_array(Route::currentRouteName(),['exams.create']) ? 'text-white' : ''}}"></i>
                                        </div>
                                        <div  class="sidebar-icon"><span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.exams.create")}}</span></div>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </li>

                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['attendances.index','attendance.classroom']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('attendances.index') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['attendances.index','attendance.classroom']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-clipboard-user fa-lg {{ in_array(Route::currentRouteName(),['attendances.index','attendance.classroom']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon"><span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.attendances.index")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['attendance.report.export']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('attendance.report.export') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['attendance.report.export'])  ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid  fa-download fa-lg  {{ in_array(Route::currentRouteName(),['attendance.report.export']) ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.attendance.report.export")}}</span></div>
                        </a>
                    </li>

                    <li class="w-full mt-2  listopennavbar " >
                        <a  id="listopennavbar" aria-controls="data-accordion-icon6" data-collapse-toggle="data-accordion-icon6" class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center
                            whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['meetings.index','meetings.create']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="#">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['meetings.index','meetings.create']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="sheta sheta-zoom-app text-2xl {{in_array(Route::currentRouteName(),['meetings.index','meetings.create']) ? 'text-white' : ''}}"></i>
                        </div>
                            <div id="sidebariconOnly13" class="sidebar-icon"> <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.meetings.index")}}</span>
                                <i  id="arrowicon" class="arrowicon fa-solid fa-chevron-down px-3  shrink-0 transition-transform duration-200"></i>
                            </div>
                            </a>

                            <ul  id="data-accordion-icon6" class="hidden px-4  transition duration-1000  ">
                                <div class="border-x-2 border-b rounded-xl border-gray-400  bg-gray-100 py-2">

                                    <li class="w-full mt-2 ">
                                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                                            {{ in_array(Route::currentRouteName(),['meetings.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                            href="{{ route('meetings.index') }}">
                                            <div
                                            class="{{ in_array(Route::currentRouteName(),['meetings.index']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                            <i class="fa-brands fa-readme text-xl {{ in_array(Route::currentRouteName(),['meetings.index']) ? 'text-white' : ''}}"></i>
                                            </div>
                                            <div  class="sidebar-icon"><span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.meetings.index")}}</span></div>
                                        </a>
                                    </li>
                                    <li class="w-full mt-2 ">
                                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                                            {{ in_array(Route::currentRouteName(),['meetings.create']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                                            href="{{ route('meetings.create') }}">
                                            <div
                                            class="{{ in_array(Route::currentRouteName(),['meetings.create']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                                            <i class="sheta sheta-zoom-app text-2xl  {{ in_array(Route::currentRouteName(),['meetings.create']) ? 'text-white' : ''}}"></i>
                                            </div>
                                            <div  class="sidebar-icon"><span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.meetings.create")}}</span></div>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                @endif
                {{-- -------------------------------------------------------------------------------------------------------------------------------------------------------------- --}}
            @if(!auth()->user()->isParent())
                <li class="w-full mt-2 ">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                        {{ in_array(Route::currentRouteName(),['posts.index','post.show']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="{{ route('posts.index') }}">
                        <div
                        class="{{ in_array(Route::currentRouteName(),['posts.index','post.show']) ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-pen-to-square fa-lg {{ in_array(Route::currentRouteName(),['posts.index','post.show']) ? 'text-white' : ''}}"></i>
                        </div>
                        <div  class="sidebar-icon"><span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.posts.index")}}</span></div>
                    </a>
                </li>
            @endif


            @if(auth()->user()->isAdmin())
                <li class="w-full mt-2 ">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                        {{ (Route::currentRouteName()== 'settings.academic_years.index') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="{{ route('settings.academic_years.index') }}">
                        <div
                        class="{{ Route::currentRouteName() == 'settings.academic_years.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-calendar fa-lg {{Route::currentRouteName() == 'settings.academic_years.index' ? 'text-white' : ''}}"></i>
                        </div>
                        <div id="sidebariconOnly10" class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{trans("main-sidebar.settings.academic_years.index")}}</span></div>
                    </a>
                </li>
                <li class="w-full mt-2 ">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                        {{ (Route::currentRouteName()== 'grade') ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="{{ route('grade') }}">
                        <div
                        class="{{ Route::currentRouteName() == 'grade' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-users-viewfinder fa-lg {{Route::currentRouteName() == 'grade' ? 'text-white' : ''}}"></i>
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
                        <i class="fa-solid fa-chalkboard fa-lg {{Route::currentRouteName() == "classrooms.index" ? 'text-white' : ''}}"></i>
                        </div>
                        <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.classes")}}</span></div>
                    </a>
                </li>
                <li class="w-full mt-2 ">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                        {{ (Route::currentRouteName()== "auditlogs.index") ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                        href="{{ route("auditlogs.index") }}">
                        <div
                        class="{{ Route::currentRouteName() == 'auditlogs.index' ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-clipboard-check fa-lg {{Route::currentRouteName() == "auditlogs.index" ? 'text-white' : ''}}"></i>
                        </div>
                        <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.auditlogs.index")}}</span></div>
                    </a>
                </li>
                @endif


                @if(auth()->user()->isTeacher())

                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['teacher.classrooms','student.info']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('teacher.classrooms') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['teacher.classrooms','student.info'])  ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid  fa-user-group fa-lg {{ in_array(Route::currentRouteName(),['teacher.classrooms','student.info'])  ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.teacher.classrooms")}}</span></div>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->isStudent())
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['student.subjects.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('student.subjects.index') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['student.subjects.index'])  ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-book fa-lg {{ in_array(Route::currentRouteName(),['student.subjects.index'])  ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.student.subjects.index")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['meetings.student.index']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('meetings.student.index') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['meetings.student.index'])  ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-brands fa-readme text-xl {{ in_array(Route::currentRouteName(),['meetings.student.index'])  ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.meetings.student.index")}}</span></div>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->isParent())
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['parent.students.index','student.info']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('parent.students.index') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['parent.students.index','student.info'])  ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-chalkboard-user fa-sharp fa-lg {{ in_array(Route::currentRouteName(),['parent.students.index','student.info'])  ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.parent.students.index")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['parent.students.attendances']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('parent.students.attendances') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['parent.students.attendances'])  ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-clipboard-user fa-lg {{ in_array(Route::currentRouteName(),['parent.students.attendances'])  ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.parent.students.attendances")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['parent.students.invoices']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('parent.students.invoices') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['parent.students.invoices'])  ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-sharp fa-solid fa-file-invoice-dollar fa-lg {{ in_array(Route::currentRouteName(),['parent.students.invoices'])  ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.parent.students.invoices")}}</span></div>
                        </a>
                    </li>
                    <li class="w-full mt-2 ">
                        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors font-semibold text-slate-700
                            {{ in_array(Route::currentRouteName(),['parent.students.receipts']) ? 'shadow-soft-xl rounded-lg bg-white' : '' }}"
                            href="{{ route('parent.students.receipts') }}">
                            <div
                            class="{{ in_array(Route::currentRouteName(),['parent.students.receipts'])  ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }} shadow-soft-2xl ml-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-sharp fa-solid fa-receipt fa-lg  {{ in_array(Route::currentRouteName(),['parent.students.receipts'])  ? 'text-white' : ''}}"></i>
                            </div>
                            <div  class="sidebar-icon">  <span class="mr-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ trans("main-sidebar.parent.students.receipts")}}</span></div>
                        </a>
                    </li>
                @endif



            </ul>
        </div>


</aside>



    {{-- End SideBar --}}
