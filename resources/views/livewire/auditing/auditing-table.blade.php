
<div>




    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6">
                    <div class="flex">
                        <div class="text-xl py-4 mx-auto inline-block text-gray-600"> {{ trans('main.auditing-title') }}</div>
                    </div>
                    <div class="flex justify-between items-end">
                        <div class="  ">
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
                    <div class="">
                        <div>
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5  text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input  id="start_date" wire:model="start_date" type="text" autocomplete="off" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  placeholder="{{trans('main.from-date')}}">
                            </div>
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5  text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input id="end_date" wire:model="end_date"type="text" autocomplete="off" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  placeholder="{{trans('main.to-date')}}">
                            </div>
                        </div>
                    </div>

                    @push('scripts')
                        <script>
                            flatpickr("#start_date", {
                                dateFormat: "Y-m-d",
                                onChange: function(selectedDates, dateStr, instance) {
                                    window.livewire.emit('dateRangeUpdated', {start_date: dateStr, end_date: document.getElementById("end_date").value});
                                }
                            });

                            flatpickr("#end_date", {
                                dateFormat: "Y-m-d",
                                onChange: function(selectedDates, dateStr, instance) {
                                    window.livewire.emit('dateRangeUpdated', {start_date: document.getElementById("start_date").value, end_date: dateStr});
                                }
                            });
                        </script>
                    @endpush


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
                    {{ __('main.user') }}
                </th>
                <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                    {{ __('main.event-type') }}
                </th>
                <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                    {{ __('main.auditable-type') }}
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
            @forelse ($audits as $audit)
                <tr class="hover:bg-gray-50">

                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar " >
                        {{ getIteration($audits,$loop) }}
                    </td>
                    <th scope="row" class="flex items-center text-cemter justify-center px-6 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="object-cover mx-1 w-10 h-10 rounded-full" src="{{ $audit->user->profile_photo_url }}" alt="{{ $audit->user->name }}" />
                        <div class="pl-3">
                            <div class="text-base font-semibold">
                                {{ $audit->user->name ?? '-' }}
                            </div>
                            <div class="font-normal text-gray-500">
                                {{$audit->user->email}}
                            </div>
                        </div>
                    </th>
                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                            @if($audit->event == 'created')
                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                                {{ trans('main.created') }}
                            </span>
                            @elseif ($audit->event == 'deleted')
                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">
                                    {{ trans('main.deleted') }}
                                </span>
                            @elseif ($audit->event == 'updated')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">
                                    {{ trans('main.updated') }}
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                    {{$audit->event}}
                                </span>
                            @endif
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                        <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-purple-400 border border-purple-400">
                            {{ $audit->auditable_type ?? '-' }}
                        </span>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                        <span class="bg-gray-100 text-gray-800 text-sm font-medium inline-flex items-center px-2.5 py-0.5  rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                        <svg aria-hidden="true" class="w-3 h-3 mx-1 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        {{ $audit->created_at ? MyCarbon::parse($audit->created_at)->format('d-m-Y H:i') : trans('main.undefined') }}
                    </span>
                    </td>
                    <td class="px-6 py-3  text-center" >
                        <livewire:auditing.auditing-information :audit="$audit" :wire:key="'info-audit-'.$audit->id" />
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
        {{ $audits->render() }}
    </div>




            </div>
    </div>

    </div>
</div>
