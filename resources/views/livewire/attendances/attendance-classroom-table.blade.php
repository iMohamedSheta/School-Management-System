


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex">
                <div class="text-xl py-4 mx-auto inline-block text-gray-600"> {{ trans('main.check-attendance-for-classroom',['classroom'=>$classroom->name]) }}</div>
            </div>
            <div class="flex">
                <div class="text-xl mx-auto inline-block text-gray-600">{{ trans('main.for-date',['date'=>date('Y-m-d')]) }}</div>
            </div>
            <div class="">
                <div class="flex justify-between">
                    <div>
                    <div class="">
                        <button wire:click='exportAttendanceForToday()' wire:loading.attr='disabled' class="btn  btn-dark " >
                            <i class="fa-regular fa-file-excel fa-xl  mx-2"></i>{{ trans('main.export-attendance-for-today') }}
                        </button>
                    </div>
                    <div class="flex items-end  w-80 mb-2">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="search-icon transition mx-6  w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="relative ">
                                <input type="search" id="floating_outlined" wire:model="search" autocomplete="off" class="search-input block px-4 pb-2 pt-2 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating_outlined"  class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 right-1">{{trans('main.search')}}</label>
                            </div>
                        </div>
                    </div>
                    </div>


        </div>
            </div>

<table class="min-w-full divide-y divide-gray-200 text-sm" id="multiselect-table">
    <thead class="bg-gray-800 text-white" wire:ignore>
        <tr>

            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('#') }}
            </th>

            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.studentname') }}
            </th>
            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.absence-times') }}
            </th>

            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.attendance') }}
            </th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <div id="multiselect-table">
        @forelse ($this->getFilteredStudents() as $student)
            <tr class="hover:bg-gray-50">

                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar " >
                    {{$loop->iteration}}
                </td>
                <th scope="row" class="flex items-center text-cemter justify-center px-6 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="object-cover mx-1 w-10 h-10 rounded-full" src="{{ $student->user->profile_photo_url }}" alt="{{ $student->user->name }}" />
                    <div class="pl-3">
                        <div class="text-base font-semibold">
                            {{ $student->name ?? '-' }}
                        </div>
                        <div class="font-normal text-gray-500">
                            {{$student->user->email}}
                        </div>
                    </div>
                </th>

                <td class=" py-3 whitespace-nowrap text-center  ">
                    {{$student->countAbsentAttendances()}}
                </td>
                <form method="post" action="{{route('attendance.store')}}">
                    @csrf
                <td class=" py-3 whitespace-nowrap text-center  ">
            @if(isset($student->attendances()->where('attendence_date',date('Y-m-d'))->first()->student_id))
                    <div class="flex items-center mr-4 justify-center">
                        <input id="attendance-{{ $student->id }}-checkbox" name="attendances[{{$student->id}}]" type="radio"  value="presence"
                        {{ $student->attendances()->latest()->first()->attendence_status == true ? 'checked' : '' }} disabled style="color:#cb0c9f;" class="w-4 h-4  bg-gray-100 border-gray-300 rounded focus:ring-0   dark:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                        <label for="attendance-{{ $student->id }}-checkbox" class="mx-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ trans('main.presence') }}</label>
                        <input id="attendance-{{ $student->id }}-checkbox2" type="radio" name="attendances[{{$student->id}}]"  value="absent"
                        {{ $student->attendances()->latest()->first()->attendence_status == false ? 'checked' : '' }} disabled style="color:#cb0c9f;" class="w-4 h-4  bg-gray-100 border-gray-300 rounded focus:ring-0   dark:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                        <label for="attendance-{{ $student->id }}-checkbox2" class="mx-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ trans('main.absent') }}</label>
                    </div>
                    @else
                    <div class="flex items-center mr-4 justify-center">
                        <input id="classroom-{{ $student->id }}-checkbox" type="radio" name="attendances[{{$student->id}}]"  value="presence"
                            style="color:#cb0c9f;" class="w-4 h-4  bg-gray-100 border-gray-300 rounded focus:ring-0   dark:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                        <label for="attendance-{{ $student->id }}-checkbox" class="mx-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ trans('main.presence') }}</label>
                        <input id="classroom-{{ $student->id }}-checkbox2" type="radio" name="attendances[{{$student->id}}]"  value="absent"
                        style="color:#cb0c9f;" class="w-4 h-4  bg-gray-100 border-gray-300 rounded focus:ring-0   dark:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                        <label for="attendance-{{ $student->id }}-checkbox2" class="mx-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ trans('main.absent') }}</label>
                    </div>
                    @endif

                    <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                        <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                </td>
            </tr>

        @empty
            <tr>

                <div class="mt-4">
                    <td colspan="4" class="px-6 py-4 whitespace-nowrap">
                        {{ __('main.no-students') }}
                    </td>
                </div>
            </tr>
        @endforelse
    </div>
</tbody>
</table>
    <div class="flex justify-end p-4 border-t">
        <button class="btn btn-primary bg-gray-800 w-64 " type="submit">{{ trans('main.attendance-check') }}</button>
    </div>
</form>





        </div>
    </div>
</div>

