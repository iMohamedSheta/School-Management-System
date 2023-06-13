


  <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/2 ">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border group hover:shadow-xl ">
            <div class="flex-auto p-4">
                <div class="flex justify-between  mx-14">
                <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                    <p class="mb-0 font-semibold leading-normal text-sm">{{ trans('main.count-parent-children') }} </p>
                    <h5 class="mb-0 font-bold">
                        {{auth()->user()->parent->countChildren() ?? __('-') }}
                    </h5>
                    </div>
                </div>
                <div class="flex items-center justify-end basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-800 to-gray-500 hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500">
                    <i class="fa-solid fa-chalkboard-user fa-sharp fa-lg leading-none  relative top-3.5 text-white"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- card2 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/2 ">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border group hover:shadow-xl ">
            <div class="flex-auto p-4">
                <div class="flex justify-between  mx-14">
                <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                    <p class="mb-0 font-semibold leading-normal text-sm">{{ trans('main.get-total-children-debit') }}</p>
                    <h5 class="mb-0 font-extrabold font-mono  {{ auth()->user()->parent->getTotalChildrenDebit() > 0 ? 'text-red-600' : 'text-green-500' }}">
                            {{auth()->user()->parent->getTotalChildrenDebit() ?? __('-') }}
                    </h5>
                    </div>
                </div>
                <div class="flex items-center justify-end basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-800 to-gray-500 hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500">
                    <i class="fa-solid fa-sack-dollar fa-xl leading-none text-lg relative top-3.5 text-white"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

<div class="bg-white  w-full h-80 shadow-xl mt-8 rounded-2xl flex justify-center items-center overflow-hidden relative">
    <video class="w-full" autoplay loop>
    <source src="{{asset('assets/videos/dashboard-1.mp4')}}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="absolute top-0 left-0  w-full h-full bg-gray-800 opacity-40"></div>
    <div class="absolute top-50 {{ App::getlocale() == 'ar' ? 'right-0' : 'left-0'}} text-white text-lg px-12  max-w-6xl">
    <h1 class="text-2xl font-semibold text-white py-2">{{ trans('main.welcome-parent', ['name' => auth()->user()->name]) }}</h1>
    <p class="px-2">{{ trans('main.thank-you-parent') }}</p>
    </div>
</div>


