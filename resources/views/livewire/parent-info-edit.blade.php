

<div>
@if($parentStep == 1)
<div class="w-full sm:max-w-md lg:max-w-2xl mt-6 px-6 pt-4  pb-2 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
    <div class="pb-10 pt-2">
        <div class="text-xl pb-4 pt-2">{{ trans('main.edit-father-info') }}</div>
        <form wire:submit.prevent="updateStudentInfo" method="post">
            @csrf
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" wire:model.defer="Name_Father" id="floating_fathername" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                <label for="floating_fathername" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.father-name') }}</label>
                @error('Name_Father')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" wire:model.defer="National_ID_Father" id="National_ID_Father" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                <label for="National_ID_Father" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.father-national-id') }}</label>
                @error('National_ID_Father')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" wire:model.defer="Passport_ID_Father" id="Passport_ID_Father" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                <label for="Passport_ID_Father" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.father-passport-id') }}</label>
                @error('Passport_ID_Father')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="tel" wire:model.defer="Phone_Father" id="Phone_Father" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                <label for="Phone_Father" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.father-phone') }}</label>
                @error('Phone_Father')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" wire:model.defer="Job_Father" id="Job_Father" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                <label for="Job_Father" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.father-job') }}</label>
                @error('Job_Father')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" wire:model.defer="Address_Father" id="Address_Father" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                    <label for="Address_Father" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.father-address') }}</label>
                    @error('Address_Father')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group ">
                        <select id="Nationality_Father_id" wire:model.defer="Nationality_Father_id" name="Nationality_Father_id" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="">{{__('main.select-father-nationalitie')}}</option>
                        @foreach ($nationalities as $nationality)
                            <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                        @endforeach
                        </select>
                        @error('Nationality_Father_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">

                <div class="relative z-0 w-full mb-6 group ">
                        <select id="Religion_Father_id" wire:model.defer="Religion_Father_id" name="Religion_Father_id" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="">{{__('main.select-father-religion')}}</option>
                        @foreach ($religions as $religion)
                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                        @endforeach
                        </select>
                        @error('Religion_Father_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                </div>

                <div class="relative z-0 w-full mb-6 group ">
                        <select id="Blood_Type_Father_id" wire:model.defer="Blood_Type_Father_id" name="Blood_Type_Father_id" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="">{{__('main.select-father-blood-type')}}</option>
                        @foreach ($blood_types as $blood_type)
                            <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                        @endforeach
                        </select>
                        @error('Blood_Type_Father_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                </div>
            </div>
            <div class="flex justify-end  mt-4">
                <button  wire:click.prevent="nextParentStep()" class="hover:active:text-gray-800" ><i class="fa-sharp fa-solid fa-caret-left fa-2xl mx-4 " style="font-size: 50px;"></i></button>
            </div>
        </div>
</div>
</div>

@endif


        @if($parentStep == 2)

            <div class="w-full sm:max-w-md lg:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
                <div class="pb-10 pt-2">
                    <div class="text-xl pb-4 pt-2">{{ trans('main.edit-mother-info') }}</div>
                {{-- Mother Information --}}
                <div class="relative z-0 w-full mb-6 group  ">
                    <input type="text" wire:model.defer="Name_Mother" id="Name_Mother" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                    <label for="Name_Mother" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.mother-name') }}</label>
                    @error('Name_Mother')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" wire:model.defer="National_ID_Mother" id="National_ID_Mother" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                    <label for="National_ID_Mother" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.mother-national-id') }}</label>
                    @error('National_ID_Mother')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" wire:model.defer="Passport_ID_Mother" id="Passport_ID_Mother" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                    <label for="Passport_ID_Mother" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.mother-passport-id') }}</label>
                    @error('Passport_ID_Mother')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="tel" wire:model.defer="Phone_Mother" id="Phone_Mother" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                    <label for="Phone_Mother" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.mother-phone') }}</label>
                    @error('Phone_Mother')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" wire:model.defer="Job_Mother" id="Job_Mother" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                    <label for="Job_Mother" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.mother-job') }}</label>
                    @error('Job_Mother')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" wire:model.defer="Address_Mother" id="Address_Mother" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                        <label for="Address_Mother" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.mother-address') }}</label>
                        @error('Address_Mother')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group ">
                            <select id="Nationality_Mother_id" wire:model.defer="Nationality_Mother_id" name="Nationality_Mother_id" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option value="">{{__('main.select-mother-nationalitie')}}</option>
                            @foreach ($nationalities as $nationality)
                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                            @endforeach
                            </select>
                            @error('Nationality_Mother_id')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">

                    <div class="relative z-0 w-full mb-6 group ">
                            <select id="Religion_Mother_id" wire:model.defer="Religion_Mother_id" name="Religion_Mother_id" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option value="">{{__('main.select-mother-religion')}}</option>
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                            @endforeach
                            </select>
                            @error('Religion_Mother_id')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="relative z-0 w-full mb-6 group ">
                            <select id="Blood_Type_Mother_id" wire:model.defer="Blood_Type_Mother_id" name="Blood_Type_Mother_id" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option value="">{{__('main.select-mother-blood-type')}}</option>
                            @foreach ($blood_types as $blood_type)
                                <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                            @endforeach
                            </select>
                            @error('Blood_Type_Mother_id')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                    </div>
            </div>
            <div class="flex items-center mt-4">
                <div class="flex justify-start ">
                    <button wire:click.prevent="perviousParentStep" class="hover:active:text-gray-800"><i class="fa-sharp fa-solid fa-caret-right fa-2xl mx-4" style="font-size: 50px;"></i></button>
                    </div>
                <button type="submit" wire:click="updateStudentInfo" class="btn btn-primary bg-gray-800 text-white w-[90%] mt-2" >
                    {{ __('main.edit-info') }}
                </button>
            </div>
        </form>

    </div>

</div>
@endif

</div>
