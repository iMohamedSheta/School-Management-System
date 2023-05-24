
<div>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6">
                    <div class="flex">
                        <div class="text-xl py-4 mx-auto inline-block text-gray-600"> {{ trans('main.student-subjects-title') }}</div>
                    </div>
                    <div class="flex justify-between">
                        <div class="  mb-2">
                            <div class="flex items-end">
                                <div class="relative  w-80 ">
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

    <div class="overflow-auto">
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
                    {{ __('main.subject-teacher') }}
                </th>

            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <div id="multiselect-table">
            @forelse ($student_subjects as $student_subject)
                <tr class="hover:bg-gray-50">

                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar " >
                        {{ getIteration($student_subjects,$loop) }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                        <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">
                        {{ $student_subject->name ?? '-' }}
                        </span>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                        {{ $student_subject->teacher->teacher_name ?? '-' }}
                    </td>

                </tr>

            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 whitespace-nowrap">
                        {{ __('main.no-subjects') }}
                    </td>
                </tr>
            @endforelse
            </div>
        </tbody>
    </table>
    </div>


    <div class="mt-4">
        {{ $student_subjects->render() }}
    </div>





            </div>
        </div>
    </div>

    </div>
