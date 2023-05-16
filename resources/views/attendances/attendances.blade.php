




@extends('layouts.master')
@section('Pagetitle',"Attendances")

@section('Content')


<div class="bg-white rounded-t-xl ">
    <div id="accordion-open" data-accordion="collapse">
        @forelse ($grades as $grade )
        <h2 id="accordion-open-heading-{{$grade->id}}">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-open-body-{{$grade->id}}" aria-expanded="true" aria-controls="accordion-open-body-{{$grade->id}}">
            <span class="flex items-center"><i class="fa-solid fa-users-viewfinder fa-lg mx-2"></i>{{$grade->name}} </span>
            <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        </h2>
        <div id="accordion-open-body-{{$grade->id}}" class="hidden p-6 bg-gray-700" aria-labelledby="accordion-open-heading-{{$grade->id}}">
            <table class="min-w-full divide-y divide-gray-200 text-sm" id="multiselect-table">
                <thead class="bg-gray-800 text-white" >
                    <tr>
                        <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                            {{ __('#') }}
                        </th>
                        <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                            {{ __('main.classroomname') }}
                        </th>
                        <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                            {{ __('main.student-count') }}
                        </th>

                        <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                            {{ __('main.actions') }}
                        </th>

                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <div id="multiselect-table">
                    @forelse ($grade->classrooms as $classroom)
                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar " style="max-width: 150px;">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" style="max-width: 150px;">
                                {{ $classroom->name }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" style="max-width: 150px;">
                                {{ $classroom->countStudents() }}
                            </td>

                            <td class="px-6 py-3 whitespace-nowrap flex justify-center ">

                                <a href="{{route('attendance.classroom',$classroom->id)}}" target="_blank" class="block px-4 py-2 rounded border border-gray-500 bg-gray-800 text-sm text-white hover:bg-gray-100 hover:text-gray-900"><i class="mx-2 fa-solid fa-file-lines fa-lg hover:text-gray-800"></i>{{ trans('main.attendance-check') }}</a>

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
        </div>
        @empty
        {{ trans('main.no-grades') }}
        @endforelse

    </div>
</div>


@endsection
