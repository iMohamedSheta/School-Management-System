
<div>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6">
                    <div class="flex">
                        <div class="text-xl py-4 mx-auto inline-block text-gray-600"> {{ trans('main.classroom-subjects-title',['classroom'=>$classroom->name]) }}</div>
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
                            <div class="inline">
                                <div class="" data-modal-target="modal-deleteAll" id="deleteAllbtn" hidden  data-modal-toggle="modal-deleteAll">
                                    <i class="fa-solid fa-trash fa-xl text-red-600 hover:text-red-500 m-3 mb-5 "></i>
                                </div>
                            </div>
                        </div>

                    </div>



            </div>

    <div class="overflow-auto">
    <table class="min-w-full divide-y divide-gray-200 text-sm" id="multiselect-table">
        <thead class="bg-gray-800 text-white" wire:ignore>
            <tr>
                <th>
                    <div class="flex items-center mr-4">
                        <label for="checkboxAll" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                        <input id="checkboxAll" type="checkbox" value="" style="color:#cb0c9f;" class="w-4 h-4 bg-gray-100 rounded focus:ring-0  dark:focus:ring-red-600 dark:ring-offset-gray-800  dark:bg-gray-700 dark:border-gray-600" ">
                    </div>
                </th>
                <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                    {{ __('#') }}
                </th>

                <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                    {{ __('main.name') }}
                </th>
                <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                    {{ __('main.subject-teacher') }}
                </th>
                <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                    {{ __('main.actions') }}
                </th>

            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <div id="multiselect-table">
            @forelse ($classroom_subjects as $classroom_subject)
                <tr class="hover:bg-gray-50">
                    <td>
                        <div class="flex items-center mr-4">
                            <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                            <input id="classroom-{{ $classroom_subject->id }}-checkbox" type="checkbox" value="{{ $classroom_subject->id }}" style="color:#cb0c9f;" class="w-4 h-4  bg-gray-100 border-gray-300 rounded focus:ring-0   dark:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar " >
                        {{ getIteration($classroom_subjects,$loop) }}
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                        <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">
                        {{ $classroom_subject->name ?? '-' }}
                        </span>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                        {{ $classroom_subject->teacher->teacher_name ?? '-' }}
                    </td>

                    <td class="px-6 py-3 whitespace-nowrap text-center">
                            <livewire:classroom.classroom-subject.classroom-subject-delete :classroom_subject="$classroom_subject" :wire:key="'delete-classroom-classroom_subject-'.$classroom_subject->id" />
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
        {{ $classroom_subjects->render() }}
    </div>

     <!-- DeleteAll modal -->
    <div id="modal-deleteAll" wire:ignore tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden max-md:w-screen max-md:h-screen p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-xl md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="modal-deleteAll">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <form action="{{route('classroom.subjects.remove')}}" method="post">
                    @method("delete")
                    @csrf
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{trans('main.delete-classroom-subjects-title')}}</h3>
                    <input class="text" type="hidden" id="selected_ids" name="selected_ids">
                    <button data-modal-hide="modal-deleteAll" type="submit" id="delete-selected-btn" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        {{trans('main.confirm')}}
                    </button>
                    <button data-modal-hide="modal-deleteAll"  type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{trans('main.cancel')}}</button>
                </div>
                </form>
            </div>
        </div>
    </div>





            </div>
        </div>
    </div>

    </div>
