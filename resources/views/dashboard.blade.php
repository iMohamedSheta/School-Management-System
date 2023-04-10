
@extends('layouts.master')
@section('Pagetitle',"Dashboard")

@section('Content')

@if(auth()->user()->isAdmin())
  <!-- cards -->
  <div class="w-full px-6 py-6 mx-auto">
    <!-- row 1 -->
    <div class="flex flex-wrap -mx-3">
      <!-- card1 -->
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 ">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border group hover:shadow-xl ">
          <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                  <p class="mb-0 font-semibold leading-normal text-sm">{{ trans('main.users-numbers') }}</p>
                  <h5 class="mb-0 font-bold">
                        {{$users_number}}
                    <span class="leading-normal text-sm font-weight-bolder {{ $new_users_percentage < 0 ? 'text-red-500' : 'text-lime-500'}} ">  {{$new_users_percentage}}%</span>
                  </h5>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-800 to-gray-500 hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500">
                  <i class="fa-sharp fa-solid fa-users leading-none text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card2 -->
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border group hover:shadow-xl ">
            <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                    <p class="mb-0 font-semibold leading-normal text-sm">{{ trans('main.students-numbers') }}</p>
                    <h5 class="mb-0 font-bold">
                    {{$students_number}}
                    <span class="leading-normal text-sm font-weight-bolder  {{ $new_students_percentage < 0 ? 'text-red-500' : 'text-lime-500'}}">{{$new_students_percentage}}%</span>
                  </h5>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-800 to-gray-500 hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500">
                    <i class="fa-solid fa-chalkboard-user fa-sharp leading-none text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card3 -->
      <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border group hover:shadow-xl ">
            <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                    <p class="mb-0 font-semibold leading-normal text-sm">{{ trans('main.teachers-numbers') }}</p>
                  <h5 class="mb-0 font-bold">
                    {{$teachers_number}}
                    <span class="leading-normal text-lime-500 text-sm font-weight-bolder  {{ $new_teachers_percentage < 0 ? 'text-red-500' : 'text-lime-500'}}">{{$new_teachers_percentage}}%</span>
                  </h5>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-800 to-gray-500 hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500">
                    <i class="fa-solid fa-person-chalkboard leading-none text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card4 -->
      <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border group hover:shadow-xl ">
            <div class="flex-auto p-4">
            <div class="flex flex-row -mx-3">
              <div class="flex-none w-2/3 max-w-full px-3">
                <div>
                    <p class="mb-0 font-semibold leading-normal text-sm">{{ trans('main.classrooms-numbers') }}</p>
                  <h5 class="mb-0 font-bold">
                    {{$classroom_number}}
                </h5>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-gray-800 to-gray-500 hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500">
                    <i class="fa-solid fa-school fa-sharp leading-none text-lg relative top-3.5 text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endif
    <!-- cards row 2 -->
    {{-- <div class="flex flex-wrap mt-6 -mx-3">
      <div class="w-full px-3 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
                <div class="flex flex-col h-full">
                  <p class="pt-2 mb-1 font-semibold">Built by developers</p>
                  <h5 class="font-bold">Soft UI Dashboard</h5>
                  <p class="mb-12">From colors, cards, typography to complex elements, you will find the full documentation.</p>
                  <a class="mt-auto mb-0 font-semibold leading-normal text-sm group text-slate-500" href="javascript:;">
                    Read More
                    <i class="fas fa-arrow-right ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
                  </a>
                </div>
              </div>
              <div class="max-w-full px-3 mt-12 ml-auto text-center lg:mt-0 lg:w-5/12 lg:flex-none">
                <div class="h-full bg-gradient-to-tl from-purple-700 to-pink-500 rounded-xl">
                  <img src="../assets/img/shapes/waves-white.svg" class="absolute top-0 hidden w-1/2 h-full lg:block" alt="waves" />
                  <div class="relative flex items-center justify-center h-full">
                    <img class="relative z-20 w-full pt-6" src="../assets/img/illustrations/rocket-white.png" alt="rocket" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
        <div class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border p-4">
          <div class="relative h-full overflow-hidden bg-cover rounded-xl" style="background-image: url('../assets/img/ivancik.jpg')">
            <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80"></span>
            <div class="relative z-10 flex flex-col flex-auto h-full p-4">
              <h5 class="pt-2 mb-6 font-bold text-white">Work with the rockets</h5>
              <p class="text-white">Wealth creation is an evolutionarily recent positive-sum game. It is all about who take the opportunity first.</p>
              <a class="mt-auto mb-0 font-semibold leading-normal text-white group text-sm" href="javascript:;">
                Read More
                <i class="fas fa-arrow-right ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
 --}}

@endsection
