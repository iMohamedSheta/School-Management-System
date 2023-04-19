


<div class="py-12 ">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8  ">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <div class="p-6">
                <div class="flex justify-between">

                    <div class="flex items-end  mb-2 w-80">
                        <div class="relative w-full">
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
                            <i class="fa-solid fa-undo fa-xl text-red-600 hover:text-red-500 m-3 mb-5 "></i>
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

        <div class="overflow-auto  w-full ">
<table class="min-w-full  text-sm divide-y divide-gray-200 " id="multiselect-table">

    <thead class="bg-gray-800 text-white" wire:ignore>
        <tr>
            <th>
                <div class="flex items-center mr-4">
                    <label for="checkboxAll" class="ml-2 text-sm font-medium  dark:text-gray-300"></label>
                    <input id="checkboxAll" type="checkbox" value="" style="color:#cb0c9f;" class="w-4 h-4 bg-gray-100 rounded focus:ring-0  dark:focus:ring-red-600 dark:ring-offset-gray-800  dark:bg-gray-700 dark:border-gray-600" ">
                </div>
            </th>
            <th scope="col" class="px-6 py-3  text-xs font-medium uppercase tracking-wider text-center" >
                {{ __('#') }}
            </th>

            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.studentname') }}
            </th>
            <th scope="col" class="px-6 py-2 text-xs font-medium uppercase tracking-wider text-center" >
                {{ __('main.old_grade') }}
            </th>
            <th scope="col" class="px-6 py-2  text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.old_classroom') }}
            </th>
            <th scope="col" class="px-6 py-2  text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.new_grade') }}
            </th>
            <th scope="col" class="px-6 py-2  text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.new_classroom') }}
            </th>
            <th scope="col" class="px-6 py-2  text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.promotion-date') }}
            </th>
            <th scope="col" class="px-6 py-2  text-xs font-medium uppercase tracking-wider text-center" >
                {{ __('main.actions') }}
            </th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200  ">
        <div >
        @forelse ($promotions as $promotion)
            <tr class="hover:bg-gray-50 group">
                <td>
                    <div class="flex items-center mr-4">
                        <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                        <input id="classroom-{{ $promotion->student->id }}-checkbox" type="checkbox" value="{{ $promotion->id }}" style="color:#cb0c9f;" class="w-4 h-4  bg-gray-100 border-gray-300 rounded focus:ring-0   dark:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar " >
                    {{ getiteration($promotions,$loop)}}
                </td>
                <th scope="row" class="flex items-center text-cemter justify-center px-6 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="object-cover mx-1 w-10 h-10 rounded-full" src="{{ $promotion->student->user->profile_photo_url }}" alt="{{ $promotion->student->user->name }}" />
                    <div class="pl-3">
                        <div class="text-base font-semibold">
                            {{ $promotion->student->name ?? '-' }}
                        </div>
                        <div class="font-normal text-gray-500">
                            {{$promotion->student->user->email}}
                        </div>
                    </div>
                </th>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar bg-red-600 text-white group-hover:bg-red-500" >
                    {{ $promotion->old_grade->name ?? '-' }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar  bg-red-600 text-white border-x-white border border-x group-hover:bg-red-500" >
                    {{ $promotion->old_classroom->name ?? '-' }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar  bg-green-500 text-white border-x-white border border-x group-hover:bg-green-400" >
                    {{ $promotion->new_grade->name ?? '-' }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar bg-green-500 text-white border-x-white border border-x group-hover:bg-green-400" >
                    {{ $promotion->new_classroom->name ?? '-' }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                    {{ MyCarbon::parse($promotion->created_at)->format('d-m-Y')?? '-' }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap">
                    <a href="{{route('student.info',$promotion->student->id)}}" target="_blank" class="mx-2">
                        <i class="fa-solid fa-file-lines fa-lg hover:text-gray-800"></i>
                    </a>
                    <button  data-modal-target="modal-delete-{{$promotion->id}}"  data-modal-toggle="modal-delete-{{$promotion->id}}" class="mx-2"><i class="fa-solid fa-undo text-red-600 hover:text-red-500 fa-lg"></i></button>
                </td>
            </tr>

                                                <!-- Delete modal -->
                            <div wire:ignore id="modal-delete-{{$promotion->id}}"  aria-hidden="true" class="fixed top-0 left-0 right-0 z-990 hidden max-md:w-screen max-md:h-screen md:py-[15%] md:px-[32%] overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                <div class="relative w-full h-full max-w-md md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 ">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="modal-delete-{{$promotion->id}}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <form action="{{route("student.promotion.back")}}" method="post" class="inline">
                                            @method("post")
                                            @csrf
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{trans('main.promotion_back_title',['name'=>$promotion->student->name])}}</h3>
                                            <input class="text" type="hidden"  name="promotionId" value="{{$promotion->id}}">
                                            <button data-modal-hide="modal-delete-{{$promotion->id}}" type="submit"   class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                {{trans('main.confirm')}}
                                            </button>
                                            <button data-modal-hide="modal-delete-{{$promotion->id}}" type="button"  class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{trans('main.cancel')}}</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

        @empty
            <tr>
                <td colspan="4" class="px-6 py-4 whitespace-nowrap">
                    {{ __('main.no-students') }}
                </td>
            </tr>
        @endforelse
        </div>
    </tbody>
</table>
    </div>

<div class="mt-4">
    {{ $promotions->render() }}
</div>

 <!-- DeleteAll modal -->
 <div wire:ignore id="modal-deleteAll" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden max-md:w-screen max-md:h-screen p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="modal-deleteAll">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form action="{{route('students.promotions.back')}}" method="post">
                @method("post")
                @csrf
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{trans('main.selected_promotions_back_title')}}</h3>
                <input class="text" type="hidden" id="selected_ids" name="selected_ids">
                <button data-modal-hide="modal-deleteAll" type="submit" id="delete-selected-btn" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    {{trans('main.confirm')}}
                </button>
                <button data-modal-hide="modal-deleteAll" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{trans('main.cancel')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>



        </div>
    </div>
</div>
</div>



