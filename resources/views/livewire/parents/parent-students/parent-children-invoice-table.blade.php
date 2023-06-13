
<div>




    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6">
                    <div class="flex justify-between">
                        <div class="  mb-2">
                            <div class="flex items-end w-80">
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

                        <div class="mb-2">
                            <div>
                                <label for="underline_select" class="sr-only">Underline select</label>
                                <select id="underline_select"  required class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer" wire:model="selectedChild">
                                    <option  disabled>{{trans('main.select-child')}}</option>
                                    <option value="AllChildren" selected >{{trans('main.all-children')}}</option>
                                    @foreach ($children as $child)
                                        <option value="{{$child->id}}">{{$child->name}}</option>
                                    @endforeach
                                </select>
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
                    {{ __('main.fee') }}
                </th>
                <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                    {{ __('main.amount') }}
                </th>
                <th scope="col" class="px-6 py-2 text-xs font-medium  uppercase tracking-wider text-center" >
                    {{ __('main.current-debit') }}
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
            @forelse ($feesinvoices as $feeinvoice)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar " >
                        {{ getIteration($feesinvoices,$loop) }}
                    </td>
                    <th scope="row" class="flex items-center text-cemter justify-center px-6 py-2 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="object-cover mx-1 w-10 h-10 rounded-full" src="{{ $feeinvoice->student->user->profile_photo_url }}" alt="{{ $feeinvoice->student->user->name }}" />
                        <div class="pl-3">
                            <div class="text-base font-semibold">
                                {{ $feeinvoice->student->name ?? '-' }}
                            </div>
                            <div class="font-normal text-gray-500">
                                {{$feeinvoice->student->user->email}}
                            </div>
                        </div>
                    </th>
                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                        <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">
                        {{ $feeinvoice->fee->title ?? '-' }}
                        </span>
                    </td>
                    <td class="px-6 pb-3 pt-4 whitespace-nowrap text-center overflow-auto simplebar" >
                        <span class="bg-red-100 text-red-800 text-sm font-mono font-bold mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                {{ $feeinvoice->formatted_amount ??  trans('main.undefined') }}
                        </span>
                    </td>
                    <td class="px-6 pb-3 pt-4 whitespace-nowrap text-center overflow-auto simplebar" >
                        <span class="bg-red-100 text-red-800 text-sm font-mono font-bold mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                            {{ $feeinvoice->student_current_debit ??  trans('main.undefined') }}
                        </span>
                    </td>

                    <td class="px-6 py-3 whitespace-nowrap text-center overflow-auto simplebar" >
                        <span class="bg-gray-100 text-gray-800 text-sm font-medium inline-flex items-center px-2.5 py-0.5  rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                        <svg aria-hidden="true" class="w-3 h-3 mx-1 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        {{ $feeinvoice->invoice_date ? MyCarbon::parse($feeinvoice->invoice_date)->format('d-m-Y') : trans('main.undefined') }}
                    </span>
                    </td>
                    <td class="px-6 py-3 whitespace-nowrap text-center">

                        <livewire:fees.fees-invoices.fee-invoice-information :feeinvoice="$feeinvoice" :wire:key="'info'.$feeinvoice->id">

                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 whitespace-nowrap">
                        {{ __('main.no-feeinvoicesinvoices') }}
                    </td>
                </tr>
            @endforelse
            </div>
        </tbody>
    </table>
    </div>


    <div class="mt-4">
        {{ $feesinvoices->render() }}
    </div>






            </div>
        </div>
    </div>




    </div>
