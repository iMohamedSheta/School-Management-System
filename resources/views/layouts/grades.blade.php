


@extends('layouts.master')

@section('Pagetitle','Grades')

@section('Content')

<div class="p-6" >

    <!-- Modal toggle -->
    <div>
        <div class="btn btn-sm btn-dark" data-modal-target="grade-modal"   data-modal-toggle="grade-modal">
                {{ trans('main.add-grade') }}
        </div>

        {{-- Modal Errors --}}
        @if ($errors->any())
        <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <div class="inline-flex flex-col">
            @foreach ($errors->all() as $error)
            <div class="inline-flex p-1">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 mx-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                            {{ $error }}
                    </div>
            </div>
                    @endforeach
                </div>
                <button type="button" class="{{LaravelLocalization::getCurrentLocale() == 'ar' ? "mr-auto" : "ml-auto"}} -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        @endif

    </div>

    {{-- Grade Table --}}
    <livewire:grade-table/>

</div>


<!-- Modal toggle -->



    <!-- Main modal -->
    <div id="grade-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden max-md:w-screen max-md:h-screen  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full" >
        <div class="relative w-full h-full max-w-md md:h-auto " >
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3
                {{LaravelLocalization::getCurrentLocale() == 'ar' ? "left-2.5" : "right-2.5" }}
                text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                    dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="grade-modal">
                    <i class="fa-solid fa-square-xmark text-2xl"></i>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ trans('main.add-grade') }}</h3>
                    <form class="space-y-6" action="{{route('grade.store')}}" method="post">
                        @csrf
                        <div>
                            <label for="gradename_ar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('main.grade-name-ar') }}</label>
                            <input type="text" name="name_ar" id="gradename_ar" class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{old('name_ar')}}" >
                        </div>
                        <div>
                            <label for="gradename_en" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('main.grade-name-en') }}</label>
                            <input type="text" name="name_en" id="gradename_en" class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{old('name_en')}}" >
                        </div>
                        <div>
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('main.grade-notes')}}</label>
                            <textarea id="message" name="notes" rows="4" class="@error('notes') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old('notes')}}</textarea>
                        </div>

                        <button  class="btn btn-dark w-full font-medium rounded-lg text-sm px-5 py-2.5 text-center ">{{trans('main.add')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


