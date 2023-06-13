





<div class="inline-flex my-2">
    <button wire:click ="openModalToCreate" class="block px-4 py-2  text-sm text-white bg-gray-800 rounded-lg hover:bg-gray-200 hover:text-gray-900">
        <i class="fa-solid fa-file-lines fa-lg hover:text-gray-800 mx-2"></i> {{ trans('main.create-academic-year') }}
    </button>


<!-- Show Info modal -->
<x-dialog-modal wire:model="openModal">
    <x-slot name="title">
        {{ trans('main.create-academic-year') }}
    </x-slot>

    <x-slot name="content">

            <form wire:submit.prevent="create" method="post">
                @csrf

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" wire:model.defer="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                        <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.name') }}</label>
                        @error('name')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" wire:model.defer="term" id="term" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                        <label for="term" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.term') }}</label>
                        @error('term')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">

                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 mb-6 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input   id="start_year"  type="text" autocomplete="off"  class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer" wire:model.defer="start_year"  value  placeholder="{{trans('main.start-year')}}">
                        @error('start_year')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror

                        @push('scripts')
                        <script>
                            flatpickr("#start_year", {
                                dateFormat: "Y",
                                onChange: function(selectedDates, dateStr, instance) {
                                document.getElementById("start_year").value = dateStr;
                            }
                            });
                        </script>
                        @endpush
                    </div>
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 mb-6 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input   id="end_year"  type="text" autocomplete="off"  class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer" wire:model.defer="end_year"  value  placeholder="{{trans('main.end-year')}}">
                        @error('end_year')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror

                        @push('scripts')
                        <script>
                            flatpickr("#end_year", {
                                dateFormat: "Y",
                                onChange: function(selectedDates, dateStr, instance) {
                                document.getElementById("end_year").value = dateStr;
                            }
                            });
                        </script>
                        @endpush
                    </div>

                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <textarea wire:model.defer="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300  focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{trans('main.write_description')}}"></textarea>
                    @error('description')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

            </form>


    </x-slot>

    <x-slot name="footer">
        <x-primary-button wire:click="create" wire:loading.attr="disabled">
            {{ trans('main.create') }}
        </x-primary-button>
        <x-secondary-button wire:click="$toggle('openModal')" wire:loading.attr="disabled">
            {{ trans('main.close') }}
        </x-secondary-button>
    </x-slot>


</x-dialog-modal>
</div>




