


<div class="w-full sm:max-w-md lg:max-w-3xl mt-0 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
    <div class="pb-4 pt-2 w-full">
        <div class="text-xl pb-6 pt-2">{{ trans('main.graduate_classroom') }}</div>

            <form action="{{route('students.graduations.store')}}" method="post">
                @csrf
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
                        <select id="classroom_id" wire:model.defer="grade_id" name="classroom_id" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
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


                        <button type="submit"  class="btn btn-primary bg-gray-800 text-white w-full mt-4" >
                        {{ __('main.graduate') }}
                        </button>
            </form>
        </div>
    </div>
