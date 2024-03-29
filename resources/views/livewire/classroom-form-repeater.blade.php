
<form class="space-y-6" wire:submit.prevent="store" method="post">
    @method('put')
    @csrf
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4">
                <!-- Classroom name  -->
                <label for="classroom_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('main.classroom-name') }}</label>
                <input type="text" wire:model="name" name="name" id="classroom_name" class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
                <div class="mt-2">
                    <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('main.add-grade')}}</label>
                    <select id="small" wire:model='grade' name="grade" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected >{{trans('main.select-grade')}}</option>
                        @forelse($grades as $grade )
                        <option value="{{$grade->id}}">{{trans($grade->name)}}</option>
                        @empty
                        <option value="There is no Grades."></option>
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="p-4">
                <!-- Classroom description -->
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('main.classroom-description') }}</label>
                <textarea id="message" wire:model="description" name="description" rows="4" class="@error('description') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>



    <!-- Repeater fields -->
    <div>
        <label for="repeater" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
@foreach($fields as $index => $field)
        <div class="container m-auto">
            <div id="repeater" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="repeater-item">
                            <div>
                            <label for="field_name_{{ $index }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ trans('main.classroom-name') }}</label>
                            <input type="text" wire:model="fields.{{ $index }}.name" name="fields[{{ $index }}][name]" id="field_name_{{ $index }}" class="@error('fields.'.$index.'.name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                            @error('fields.'.$index.'.name')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="mt-2" >
                                <label for="field_grade_{{ $index }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('main.add-grade')}}</label>
                                <select wire:model="fields.{{ $index }}.grade" name="fields[{{ $index }}][grade]" id="field_grade_{{ $index }}" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>{{trans('main.select-grade')}}</option>
                                    @forelse($grades as $grade )
                                    <option value="{{$grade->id}}">{{trans($grade->name)}}</option>
                                    @empty
                                    <option selected >There is no Grades.</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    <div>
                        <label for="field_description_{{ $index }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{trans('main.classroom-description')}}</label>
                        <textarea id="field_description_{{ $index }}" wire:model="fields.{{ $index }}.description" name="fields[{{ $index }}][description]" rows="4" class="@error('notes') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    </div>

                </div>

            </div>
            <div class="flex justify-center pb-4 border-b-4 mb-4">
                <div class="btn btn-danger w-1/2 m-auto font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                    <button type="button" wire:click.prevent="removeField({{ $index }})">{{ trans('main.remove-field-classes') }}</button>
                </div>
            </div>

            @endforeach

        </div>

<div class="container m-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <div class="">
        <button class="btn btn-primary w-full font-medium rounded-lg text-sm px-5 py-2.5 text-center" wire:click.prevent="addField">{{ trans('main.add-field-classes') }}</button>
    </div>
    <div>
        <!-- Submit button -->
        <button class="btn btn-dark w-full font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-0">{{ trans('main.add') }}</button>
    </div>
    </div>
</div>
</form>
