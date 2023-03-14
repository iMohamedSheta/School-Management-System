




@extends('layouts.master')

@section('Content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">



            <div class="p-6">
                <div class="flex justify-between">
                <!-- Modal toggle to add new grade -->
                <div class="flex items-center">
                    <div class="btn btn-sm btn-dark fs:hidden sm:block" data-modal-target="grade-modal"  data-modal-toggle="grade-modal" >
                            {{ trans('main.add-classroom') }}
                    </div>
                    {{-- Phone Button with icon --}}
                    <div class="btn btn-sm btn-dark fs:block sm:hidden px-3 py-2 "  data-modal-target="grade-modal"  data-modal-toggle="grade-modal" >
                        <i class="fa-regular fa-pen-to-square"></i>
                    </div>

                    <div class="btn btn-sm btn-danger mx-2" data-modal-target="grade-modal-deleteAll" id="deleteAllbtn" hidden  data-modal-toggle="grade-modal-deleteAll">
                            {{ trans('main.delete-selected') }}
                    </div>
                </div>

                <div class="relative ">
                    <div id="search-icon" class="absolute top-0 search-icon left-0 mt-2 ml-2 text-gray-400 cursor-pointer transform transition-transform ">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <form id="live-search-form" method="post" action="{{route("classrooms.search")}}">
                        <input type="text" id="search_classrooms" autocomplete="off" class="search-input block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{trans('main.search')}}" name="search">
                        <input type="submit" value="Search" style="display: none;">
                        <div id="search-results" class="bg-white border border-gray-300 rounded-lg my-2 w-full"></div>
                    </form>
                    <div>
                        <form method="post" action="{{route('classroom.filter')}}" id="classroom-form">
                            @csrf
                            <label for="underline_select" class="sr-only">Underline select</label>
                            <select id="grade-select" name="Grade_id" required class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">

                                <option selected disabled>{{trans('main.select-grade')}}</option>
                                <option value="AllGrades">{{trans('main.all-grades')}}</option>
                                @forelse ($grades as $grade )
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @empty
                                <option value="">{{ trans('main.no-grade') }}</option>
                                @endforelse
                            </select>
                        </form>
                    </div>
                </div>


                </div>

                <table class="min-w-full divide-y divide-gray-200" id="classrooms-table">
                    <thead class="bg-gray-50">
                        <tr>
                            <th>
                                <div class="flex items-center mr-4">
                                    <label for="checkboxAll" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                    <input id="checkboxAll" type="checkbox" value="" style="color:#cb0c9f;" class="w-4 h-4 bg-gray-100 rounded focus:ring-0  dark:focus:ring-red-600 dark:ring-offset-gray-800  dark:bg-gray-700 dark:border-gray-600" ">
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center" style="max-width: 150px;">
                                {{ __('#') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center" style="max-width: 150px;">
                                {{ __('main.classroomname') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center" style="max-width: 150px;">
                                {{ __('main.description') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center" style="max-width: 150px;">
                                {{ __('main.grade') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center" style="max-width: 150px;">
                                {{ __('main.actions') }}
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <div id="classrooms-table">
                        @forelse ($classrooms as $classroom)
                            <tr>
                                <td>
                                    <div class="flex items-center mr-4">
                                        <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                        <input id="classroom-{{ $classroom->id }}-checkbox" type="checkbox" value="{{ $classroom->id }}" style="color:#cb0c9f;" class="w-4 h-4  bg-gray-100 border-gray-300 rounded focus:ring-0   dark:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar " style="max-width: 150px;">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" style="max-width: 150px;">
                                    {{ $classroom->name }}
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" style="max-width: 150px;">
                                    {{ $classroom->description ?? '-' }}
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" style="max-width: 150px;">
                                    {{ $classroom->grade->name ?? '-' }}
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap flex justify-center ">
                                    <button  data-modal-target="grade-modal{{$classroom->id}}"   data-modal-toggle="grade-modal{{$classroom->id}}"
                                    onclick="document.getElementById('edit-classroom-id').value = '{{ $classroom->id }}';"
                                        class="btn btn-dark btn-sm  mx-2">{{ __('main.edit') }}
                                    </button>


                                    <!-- Edit modal -->
                    <div id="grade-modal{{$classroom->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden max-md:w-screen max-md:h-screen p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Close button -->
                            <button type="button" class="absolute top-3 {{LaravelLocalization::getCurrentLocale() == 'ar' ? "left-2.5" : "right-2.5" }}
                            text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto
                            inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="grade-modal{{$classroom->id}}">
                            <i class="fa-solid fa-square-xmark text-2xl"></i>
                            <span class="sr-only">Close modal</span>
                            </button>
                            <!-- Modal header and form -->
                            <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ trans('main.edit-classroom') }}</h3>
                            <form class="space-y-6" action="{{route("classroom.update", $classroom->id)}}" method="post">
                                @method('put')
                                @csrf
                                {{-- <input type="hidden" id="edit-classroom-id" name="id" value=""> --}}
                                <!-- Grade name in English -->
                                <div>
                                <label for="classroom_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('main.classroom-name') }}</label>
                                <input type="text" name="name" id="classroom_name" class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$classroom->name}}" >
                                </div>
                                <div class="mt-2" >
                                    <label for="field_grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('main.edit-grade')}}</label>
                                    <select name="grade" id="field_grade" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected value="{{$classroom->grade_id}}">{{$classroom->grade->name}}</option>
                                        @forelse($grades as $grade )
                                        @if($grade->id != $classroom->grade->id )
                                        <option value="{{$grade->id}}">{{trans($grade->name)}}</option>
                                        @endif
                                    @empty
                                        <option selected >{{trans('main.no-grade')}}</option>

                                        @endforelse
                                    </select>
                                </div>
                                <!-- Grade notes -->
                                <div>
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('main.classroom-description')}}</label>
                                <textarea id="message" name="description" rows="4" class="@error('notes') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$classroom->description}}</textarea>
                                </div>
                                <!-- Submit button -->
                                <button  class="btn btn-dark w-full font-medium rounded-lg text-sm px-5 py-2.5 text-center ">{{trans('main.edit')}}</button>
                            </form>
                            </div>
                        </div>
                        </div>
                </div>

                                    <form action="{{ route('classroom.destroy', $classroom) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button  class="btn btn-danger btn-sm mx-2">{{ __('main.delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 whitespace-nowrap">
                                    {{ __('main.no-classrooms') }}
                                </td>
                            </tr>
                        @endforelse
                        </div>
                    </tbody>
                </table>


                <div class="mt-4">
                    {{ $classrooms->links() }}
                </div>
            </div>
        </div>
    </div>
</div>





            <!-- Main modal -->
            <div id="grade-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden max-md:w-screen max-md:h-screen p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-3xl md:h-auto max-h-screen">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-y-auto">
                    <!-- Close button -->
                    <button type="button" class="absolute top-3 {{LaravelLocalization::getCurrentLocale() == 'ar' ? "left-2.5" : "right-2.5" }}
                    text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                    dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="grade-modal">
                    <i class="fa-solid fa-square-xmark text-2xl"></i>
                    <span class="sr-only">Close modal</span>
                    </button>
                    <!-- Modal header and form -->
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ trans('main.add-classroom') }}</h3>

                            <!-- Form Repeater -->
                            <livewire:classroom-form-repeater>

                    </div>
                </div>
                </div>
            </div>

            <!-- DeleteAll modal -->
            <div id="grade-modal-deleteAll" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden max-md:w-screen max-md:h-screen p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="grade-modal-deleteAll">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <form action="{{route('classroom.deleteselected')}}" method="post">
                            @method("delete")
                            @csrf
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{trans('main.delete-classrooms-title')}}</h3>
                            <input class="text" type="hidden" id="selected_classrooms_ids" name="selected_classrooms_ids" value="">
                            <button data-modal-hide="grade-modal-deleteAll" type="submit" id="delete-selected-btn" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                {{trans('main.delete-classrooms-confirm')}}
                            </button>
                            <button data-modal-hide="grade-modal-deleteAll" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{trans('main.delete-classrooms-cancel')}}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>





{{-- Search Classrooms --}}
<script type="module">
    import { setupSearchClassrooms } from "{{ asset('search.js') }}";

    // Get the input elements
    let searchInput = document.getElementById('search_classrooms');
    let userIdInput = document.getElementById('user_id');

    // Add Search for Users Function
    setupSearchClassrooms(searchInput);
</script>

{{-- Filter Classrooms --}}
<script>
    // Get references to the select element and the form element
    var gradeSelect = document.getElementById('grade-select');
    var classroomForm = document.getElementById('classroom-form');

    // Add an event listener to the select element that listens for changes
    gradeSelect.addEventListener('change', function() {
        // Submit the form when the select element changes
        classroomForm.submit();
        // Store the selected value in localStorage
        localStorage.setItem('selectedGrade', this.value);
    });

    // When the page loads, check if there is a value stored in localStorage
    var selectedGrade = localStorage.getItem('selectedGrade');
    if (selectedGrade) {
        // If there is a value stored, set the value of the select element to that value
        gradeSelect.value = selectedGrade;
    }
</script>












@endsection
