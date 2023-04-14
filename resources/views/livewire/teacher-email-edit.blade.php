
<div class="flex">

<div>
    <div href="#" class="block max-w-lg p-6 mt-4  bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
        <div class="flex justify-center mb-2 items-center">
            <div class=" mx-auto text-6xl py-2">
                <i class="fa-solid fa-envelope-open-text  mx-3" ></i>
            </div>
            <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white"> {{ trans('main.teacher-edit-email-title',['name'=> $teacher_user->teacher->teacher_name]) }} </h5>
        </div>
        <p class="font-normal text-gray-700 dark:text-gray-400">{{ trans('main.teacher-edit-email-body',['name'=> $teacher_user->teacher->teacher_name]) }}</p>
    </div>

</div>
<div class="w-full">
    <div class="w-full sm:max-w-md lg:max-w-xl mt-0 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
        <div class="mt-2 mb-4">
            {{ trans('main.edit-name-and-email') }}
        </div>
        <form method="POST" wire:submit.prevent="editUserEmail" >
            @csrf
            <div>
                <x-label for="name" value="{{ __('main.name') }}" />
                <x-input id="name" class="block mt-1 w-full" wire:model.defer='name' type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                @error('name')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('main.email') }}" />
                <x-input id="email" class="block mt-1 w-full" wire:model.defer='email' type="email" name="email" :value="old('email')" required autocomplete="username" />
                @error('email')
                <div class="text-red-600 text-sm">{{ $message }}</div>
               @enderror
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('main.edit-info') }}
                </x-button>
            </div>
        </form>
    </div>

    <div class="w-full sm:max-w-md lg:max-w-xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
        <div class="mt-2 mb-4">
            {{ trans('main.edit-password-info') }}
        </div>
        <x-validation-errors class="mb-4" />

        <form method="POST"  wire:submit.prevent="editUserPassword">
            @csrf

            <div class="mt-4">
                <x-label for="password" value="{{ __('main.new_password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" wire:model="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('main.confirm_new_password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" wire:model="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('main.reset_password') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
</div>
