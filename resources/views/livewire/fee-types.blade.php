




<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <div class="p-6">
                <div class="flex justify-between">
                    <div class="  mb-2">

                        <div class="inline-block">
                            <button class="btn btn-sm btn-dark fs:hidden sm:block active:bg-gray-500" data-modal-target="add-fee"  data-modal-toggle="add-fee">
                                <i class="fa-solid fa-pen mx-1"></i>{{ trans('main.add-feetype-btn') }}
                            </button>
                        </div>
                        <div class="btn btn-sm btn-dark fs:block sm:hidden px-3 py-2 "  data-modal-target="add-fee"  data-modal-toggle="add-fee" >
                            <i class="fa-regular fa-pen-to-square"></i>
                        </div>
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
<table class="min-w-full divide-y divide-gray-200 text-sm" id="multiselect-table" >
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
                {{ __('main.feetype') }}
            </th>
            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.name-en') }}
            </th>

            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.description') }}
            </th>

            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.created-at') }}
            </th>

            <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                {{ __('main.actions') }}
            </th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <div id="multiselect-table">
        @forelse ($feetypes as $feetype)
            <tr class="hover:bg-gray-50">
                <td>
                    <div class="flex items-center mr-4">
                        <label for="red-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                        <input id="classroom-{{ $feetype->id }}-checkbox" type="checkbox" value="{{ $feetype->id }}" style="color:#cb0c9f;" class="w-4 h-4  bg-gray-100 border-gray-300 rounded focus:ring-0   dark:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar " >
                    {{ getIteration($feetypes,$loop) }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                    {{ $feetype->name ?? trans('main.undefined') }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                    {{ $feetype->name_en ?? trans('main.undefined') }}
                </td>
                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                    {{ $feetype->description ?? trans('main.undefined') }}
                </td>


                <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                    <span class="bg-gray-100 text-gray-800 text-sm font-medium inline-flex items-center px-2.5 py-0.5  rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                    <svg aria-hidden="true" class="w-3 h-3 mx-1 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    {{ $feetype->created_at ? MyCarbon::parse($feetype->created_at)->format('d-m-Y') : trans('main.undefined') }}
                </span>
                </td>

                <td class="px-6 py-3 whitespace-nowrap text-center" wire:key='$feetype->id'>

                    <livewire:fees.fee-type-info :feetype="$feetype" :wire:key="'info'.$feetype->id">

                    <livewire:fees.fee-type-edit :feetype="$feetype" :wire:key="'edit'.$feetype->id">

                    <livewire:fees.delete-fee-type :feetype="$feetype" :wire:key="'delete'.$feetype->id" />

                </td>
            </tr>

        @empty
            <tr>
                <td colspan="4" class="px-6 py-4 whitespace-nowrap">
                    {{ __('main.no-feetypes') }}
                </td>
            </tr>
        @endforelse
        </div>
    </tbody>
</table>
</div>

<div class="mt-4">
    {{ $feetypes->render() }}
</div>

 <!-- DeleteAll modal -->
 <div id="modal-deleteAll" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden max-md:w-screen max-md:h-screen p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="modal-deleteAll">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form action="{{route('feetypes.selected.destroy')}}" method="post">
                @method("delete")
                @csrf
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{trans('main.delete_feetypes_title')}}</h3>
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



      <!-- Main modal -->
      <div wire:ignore id="add-fee" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden max-md:w-screen max-md:h-screen p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-3xl md:h-auto max-h-screen">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-y-auto">
            <!-- Close button -->
            <button type="button" class="absolute top-3 {{LaravelLocalization::getCurrentLocale() == 'ar' ? "left-2.5" : "right-2.5" }}
            text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
            dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="add-fee">
            <i class="fa-solid fa-square-xmark text-2xl"></i>
            <span class="sr-only">Close modal</span>
            </button>
            <!-- Modal header and form -->
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ trans('main.add-feetype') }}</h3>


                    <form class="space-y-6" wire:submit.prevent="createFeeType" method="post">
                        @csrf
                        <div class="container mx-auto">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="p-4">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('main.name') }}</label>
                                    <input type="text" wire:model="name" name="name" id="name" class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="p-4">
                                    <label for="name_en" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('main.name-en') }}</label>
                                    <input type="text" wire:model="name_en" name="name_en" id="name_en" class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ old('name_en') }}">
                                    @error('name_en')
                                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="px-4 pb-6">
                                <!-- fee description -->
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('main.description') }}</label>
                                <textarea id="message" wire:model="description" name="description" rows="4" class="@error('description') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type='submit' data-modal-hide="add-fee" wire:submit.prevent='createFeeType' class='btn btn-primary w-full bg-gray-800'>{{trans('main.add')}}</button>
                        </div>
                    </form>
            </div>
        </div>
        </div>
    </div>
</div>
