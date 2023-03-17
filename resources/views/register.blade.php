




@extends("layouts.master")
@section('Pagetitle','Add Users')
@section('Content')
<div class="pb-14 pt-7 flex">
<div class="block px-[10%]  mt-[5%]">

    <ol class="relative text-gray-500 border-r border-gray-200 dark:border-gray-700 dark:text-gray-400">
        <li class="mb-10 mr-6">
            <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                <svg aria-hidden="true" class="w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </span>
            <h3 class="font-medium leading-tight">{{ trans('main.account-info') }}</h3>
            <p class="text-sm">Step details here</p>
        </li>
        <li class="mb-10 mr-6">
            <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </span>
            <h3 class="font-medium leading-tight">{{ trans('main.personal-info') }}</h3>
            <p class="text-sm">Step details here</p>
        </li>
        <li class="mb-10 mr-6">
            <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
            </span>
            <h3 class="font-medium leading-tight">{{ trans('main.review') }}</h3>
            <p class="text-sm">Step details here</p>
        </li>
        <li class="mr-6">
            <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            </span>
            <h3 class="font-medium leading-tight">{{ trans('main.confirmation') }}</h3>
            <p class="text-sm">Step details here</p>
        </li>
    </ol>

</div>

<div class="w-full sm:max-w-md lg:max-w-xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('main.name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('main.email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('main.password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('main.confirm-password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <label for="role" class="block font-medium text-sm text-gray-700">
                    {{ __('main.role') }}
                </label>
                <select name="role" id="role" class="form-select block w-full mt-1 rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'">
                    <option value="">{{trans('main.select-role')}}</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>


            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center ">
                            <x-checkbox name="terms" class="mx-2" id="terms" required />

                            <div class="ml-2">
                                {!! __('main.agree', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('main.terms-of-service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('main.privacy-policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('main.register') }}
                </x-button>
            </div>
        </form>
</div>
</div>
@endsection
