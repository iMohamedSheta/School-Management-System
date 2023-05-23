


<div class="w-full sm:max-w-md lg:max-w-2xl mt-0 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
    <div class="pb-10 pt-2 w-full">
        <div class="text-xl pb-4 pt-2">{{ trans('main.add-subject') }}</div>

        <form wire:submit.prevent="createSubject" method="post">
            @csrf

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" wire:model.defer="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                    <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.name') }}</label>
                    @error('name')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group ">
                    <select id="teacher_id" wire:model.defer="teacher_id" name="teacher_id" autocomplete="off" class="block py-2.5  px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option value="">{{__('main.select-teacher-for-subject')}}</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }}</option>
                    @endforeach
                    </select>
                    @error('teacher_id')
                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

           

                <div class="relative z-0 w-full mb-6 group">
                  <textarea wire:model.defer="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300  focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{trans('main.write_description')}}"></textarea>
                  @error('description')
                  <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                  @enderror
              </div>



            <button type="submit" wire:submit='createSubject' class="btn btn-primary bg-gray-800 text-white w-full mt-4" >
                {{ __('main.add-the-subject') }}
            </button>
        </form>

    </div>

</div>
