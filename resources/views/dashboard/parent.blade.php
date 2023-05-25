


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


