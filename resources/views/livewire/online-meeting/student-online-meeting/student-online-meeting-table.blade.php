


<div class="py-12">
    <div class=" mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

            <div class="">
                <div class="flex justify-between">
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



                <div class="mb-2">
                    <div>
                        <label for="underline_select" class="sr-only">Underline select</label>
                        <select id="grade-select" name="Grade_id" required class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer" wire:model="selectedGrade" onchange="Livewire.emit('updatedGradeId',this.value)">

                            <option selected disabled>{{trans('main.select-grade')}}</option>
                            <option value="AllGrades">{{trans('main.all-grades')}}</option>
                            @forelse ($grades as $grade )
                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                            @empty
                            <option value="">{{ trans('main.no-grade') }}</option>
                            @endforelse
                        </select>
                    </div>
                    <div>
                            <label for="underline_select" class="sr-only">Underline select</label>
                            <select id="grade-select" name="Grade_id" required class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer" wire:model="selectedClassroom" >

                                <option selected disabled>{{trans('main.select-classroom')}}</option>
                                <option value="AllClassrooms">{{trans('main.all-grades')}}</option>
                                @forelse ($classrooms as $classroom )
                                <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                @empty
                                <option value="">{{ trans('main.no-classrooms') }}</option>
                                @endforelse
                            </select>
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
                {{ __('main.name') }}
            </th>
            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.topic-onlineclass') }}
            </th>
            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.grade') }}
            </th>
            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.classroom') }}
            </th>
            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.start-at-onlineclass') }}
            </th>
            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.actions') }}
            </th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($meetings as $meeting)
            <tr class="hover:bg-gray-50">

                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar " >
                    {{ getIteration($meetings,$loop) }}
                </td>
                <th scope="row" class="flex items-center text-cemter justify-center px-6 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="object-cover mx-1 w-10 h-10 rounded-full" src="{{ $meeting->user->profile_photo_url }}" alt="{{ $meeting->user->name }}" />
                    <div class="pl-3">
                        <div class="text-base font-semibold">
                            {{ $meeting->user->name ?? '-' }}
                        </div>
                        <div class="font-normal text-gray-500">
                            {{$meeting->user->email}}
                        </div>
                    </div>
                </th>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                    {{ $meeting->topic ?? '-' }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                    {{ $meeting->grade->name ?? '-' }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                    {{ $meeting->classroom->name ?? '-' }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap break text-center  " >
                    <span class=" {{MyCarbon::now() <= $meeting->start_at ? 'bg-green-500' : 'bg-red-500' }} text-white text-sm break-words font-medium inline-flex items-center px-2.5  rounded  dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                        <svg aria-hidden="true" class="w-3 h-3 mx-1 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        {{ MyCarbon::parse($meeting->start_at)->format('F j, Y \a\t h:i A') ?? trans('main.undefined') }}
                    </span>
                </td>
                <td class=" py-3 whitespace-nowrap text-center  ">

                        <div>
                            <a href="{{$meeting->join_url}}" target="_blank" class="block px-4 py-2 text-sm text-gray-900 bg-gray-200 rounded-lg hover:text-white hover:bg-gray-900 mx-2"><i class="mx-2 fa-solid fa-arrow-right-to-bracket fa-lg hover:text-gray-800"></i>{{ trans('main.join-url') }}</a>
                        </div>
                </td>

            </tr>

        @empty
            <tr>

                <div class="mt-4">
                    <td colspan="4" class="px-6 py-4 whitespace-nowrap">
                        {{ __('main.no-meetings') }}
                    </td>
                </div>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $meetings->render() }}
</div>




        </div>
    </div>
</div>
