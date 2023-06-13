


<div class="w-full sm:max-w-md lg:max-w-3xl mt-0 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
    <div class="pb-4 pt-2 w-full">
        <div class="text-xl font-semibold px-2 pb-3 pt-2">{{ trans('main.promote_classroom') }}</div>
        <div class="text-md px-6 pt-4 text-gray-500 border-t-2 mt-2">
            {{ trans('main.promote-classroom-description-one') }}
        </div>
        <div class="text-md px-6 pt-3 pb-8 text-gray-500 border-b-2">
            {{ trans('main.promote-classroom-description-two') }}
        </div>

            <form action="{{route('students.promotions.store')}}" method="post">
                @csrf
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group ">
                        <select id="from_grade" wire:model.defer="from_grade" name="from_grade" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer" onchange="Livewire.emit('updatedFromGradeId', this.value)">
                            <option value="">{{__('main.select-grade')}}</option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                        </select>
                        @error('from_grade')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-6 group ">
                        <select id="from_classroom" wire:model.defer="from_classroom" name="from_classroom" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="">{{__('main.select-classroom')}}</option>
                        @foreach ($classrooms_from as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                        @endforeach
                        </select>
                        @error('from_classroom')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="text-md pb-3 px-2">{{ trans('main.promote_to') }}</div>

                <div class="grid md:grid-cols-2 md:gap-6 mb-4">
                    <div class="relative z-0 w-full  group ">
                        <select id="to_grade" wire:model.defer="to_grade" name="to_grade" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer" onchange="Livewire.emit('updatedToGradeId', this.value)">
                            <option value="">{{__('main.select-grade')}}</option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                        </select>
                        @error('to_grade')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full  group ">
                        <select id="to_classroom" wire:model.defer="to_classroom" name="to_classroom" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option value="">{{__('main.select-classroom')}}</option>
                        @foreach ($classrooms_to as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                        @endforeach
                        </select>
                        @error('to_classroom')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>





                        <button type="submit"  class="btn btn-primary bg-gray-800 text-white w-full mt-4" >
                        {{ __('main.promote') }}
                        </button>
            </form>
        </div>
    </div>
