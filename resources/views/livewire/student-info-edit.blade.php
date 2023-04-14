<div class="w-full sm:max-w-md lg:max-w-2xl mt-0 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
    <div class="pb-10 pt-2 w-full">
        <div class="text-xl pb-4 pt-2">{{trans('main.student-info-edit')}}</div>

        <form wire:submit.prevent="updateStudentInfo" method="post">
            @csrf
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" wire:model.defer="name_student" id="name_student" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off"  placeholder=" "  />
                <label for="name_student" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{trans('main.studentname')}}</label>
                @error('name_student')
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" wire:model.defer="academic_year" id="academic_year" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                    <label for="academic_year" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.academic-year') }} </label>
                    @error('academic_year')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group ">
                    <select id="grade_id" wire:model.defer="grade_id" name="grade_id" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer" onchange="Livewire.emit('updatedGradeId', this.value)">
                        <option value="">{{__('main.select-grade')}}</option>
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                    @endforeach
                    </select>
                    @error('grade_id')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group ">
                    <select id="classroom_id" wire:model.defer="classroom_id" name="classroom_id" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option value="">{{__('main.select-classroom')}}</option>
                    @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                    </select>
                    @error('classroom_id')
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
                    <input   id="date_birth"  type="text" autocomplete="off"  class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer" wire:model.defer="date_birth"  value  placeholder="{{trans('main.date-birth')}}">
                    @error('date_birth')
                     <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                  </div>
            </div>
                  <div class="relative" >
                        <input type="text" id="search_parent" name="search" class="w-full search-input py-2 pl-10 pr-6 leading-tight text-gray-700 bg-white border border-gray-300 rounded-lg shadow-md appearance-none focus:outline-none focus:shadow-outline" autocomplete="off"  value="{{$student->parent->user->name}}" placeholder="{{__('main.search-parent')}}">
                    <div id="search-icon" class="absolute top-0 search-icon left-0 mt-2 ml-2 text-gray-400 cursor-pointer transform transition-transform ">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="hidden" id="parent_id" wire:model.defer="parent_id" name="parent_id">
                    @error('parent_id')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                       @enderror
                    </div>

                    <div id="search-results" class="bg-white border border-gray-300 rounded-lg my-2 w-full"></div>



            <button type="submit" wire:submit='updateStudentInfo' class="btn btn-primary bg-gray-800 text-white w-full mt-4" >
                {{ __('main.edit-info') }}
            </button>
        </form>

    </div>

</div>


{{-- Import Search Users and add user_id inside hidden input --}}
<script type="module">

    import { setupSearchParents } from "{{ asset('search.js') }}";

    // Get the input elements
        let searchInput = document.getElementById('search_parent');
        let userIdInput = document.getElementById('parent_id');

        // Add Search for Users Function
        setupSearchParents(searchInput, userIdInput);
</script>
