


<div class="w-full sm:max-w-md lg:max-w-3xl mt-0 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
    <div class="pb-4 pt-2 w-full">
        <div class="text-xl font-semibold px-2 pb-3 pt-2">{{ trans('main.associate-subject-to-classroom') }}</div>
        <div class="text-md px-6 pt-4 text-gray-500 border-t-2 mt-2">
            {{ trans('main.associate-subject-to-classroom-description-one') }}
        </div>
        <div class="text-md px-6 pt-3 pb-8 text-gray-500 border-b-2">
            {{ trans('main.associate-subject-to-classroom-description-two') }}
        </div>
        <div class="mx-4">
            <form wire:submit.prevent="associateSubjectToClassroom()" method="post">
                @csrf

                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" wire:model.defer="name" id="name" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" disabled  autocomplete="off" placeholder=" "  />
                    <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.subject-name') }}</label>
                    @error('name')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>



                <div class="grid md:grid-cols-2 md:gap-6">
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
                </div>


                <button type="submit" wire:submit='associateSubjectToClassroom' wire:loading.attr='disabled'  class="btn btn-primary bg-gray-800 text-white w-full mt-4" >
                {{ __('main.associate') }}
                </button>
            </form>
        </div>
        </div>
    </div>
