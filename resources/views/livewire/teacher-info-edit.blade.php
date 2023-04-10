<div class="w-full sm:max-w-md lg:max-w-2xl mt-0 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
    <div class="pb-10 pt-2">
        <div class="text-xl pb-4 pt-2">{{ trans('main.edit-teacher-info') }}</div>

        <form wire:submit.prevent="updateTeacherInfo" method="post">
            @csrf

            <div class="relative z-0 w-full mb-6 group">
                <input type="text" wire:model.defer="teacher_name" id="teacher_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                <label for="teacher_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.name') }}</label>
                @error('teacher_name')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" wire:model.defer="national_id_teacher" id="national_id_teacher" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                <label for="national_id_teacher" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.national-id') }}</label>
                @error('national_id_teacher')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" wire:model.defer="passport_id_teacher" id="passport_id_teacher" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                <label for="passport_id_teacher" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.passport-id') }}</label>
                @error('passport_id_teacher')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group">
                <input type="tel" wire:model.defer="phone_teacher" id="phone_teacher" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                <label for="phone_teacher" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.phone') }}</label>
                @error('phone_teacher')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" wire:model.defer="address" id="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                <label for="address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.address') }}</label>
                @error('address')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group ">
                    <select id="specialization_id" wire:model.defer="specialization_id" name="specialization_id" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option value="">{{__('main.select-specialization')}}</option>
                    @foreach ($specializations as $specialization)
                        <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                    @endforeach
                    </select>
                    @error('specialization_id')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group ">
                        <select id="nationality_id" wire:model.defer="nationality_id" name="nationality_id" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="">{{__('main.select-nationalitie')}}</option>
                        @foreach ($nationalities as $nationality)
                            <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                        @endforeach
                        </select>
                        @error('nationality_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">

                <div class="relative z-0 w-full mb-6 group ">
                        <select id="religion_id" wire:model.defer="religion_id" name="religion_id" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="">{{__('main.select-religion')}}</option>
                        @foreach ($religions as $religion)
                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                        @endforeach
                        </select>
                        @error('religion_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                </div>

                <div class="relative z-0 w-full mb-6 group ">
                        <select id="blood_type_id" wire:model.defer="blood_type_id" name="blood_type_id" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="">{{__('main.select-blood-type')}}</option>
                        @foreach ($blood_types as $blood_type)
                            <option value="{{ $blood_type->id }}">{{ $blood_type->name }}</option>
                        @endforeach
                        </select>
                        @error('blood_type_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">

                <div class="relative z-0 w-full mb-6 group ">
                        <select id="gender_id" wire:model.defer="gender_id" name="gender_id" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="">{{__('main.select-gender')}}</option>
                        @foreach ($genders as $gender)
                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                        @endforeach
                        </select>
                        @error('gender_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                </div>


                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg aria-hidden="true" class="w-5 h-5 mb-6 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input   id="joining_date"  type="text" autocomplete="off"  class="block  py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer" wire:model.defer="joining_date"  value  placeholder="{{trans('main.joining-date')}}">
                    @error('joining_date')
                     <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                  </div>

            </div>


            <button type="submit" class="btn btn-primary bg-gray-800 text-white w-full mt-4" >
                {{ __('main.edit-info') }}
            </button>
        </form>

    </div>

</div>
