

<div>

<div class="container">
    @if ($currentStep === 1)



        <div class="pb-14 pt-7 md:flex hs:block ">
            <div class="block px-[10%]  mt-[5%]">

                <ol class="relative text-gray-500 border-r border-gray-200 dark:border-gray-700 dark:text-gray-400">
                    <li class="mb-10 mr-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        </span>
                        <h3 class="font-medium leading-tight">{{ trans('main.account-info') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.account-info-details') }}</p>
                    </li>
                    <li class="mb-10 mr-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <i class="fa-solid fa-user-shield"></i>
                        </span>
                        <h3 class="font-medium leading-tight">{{ trans('main.assign') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.assign-role-details') }}</p>
                    </li>
                    <li class="mb-10 mr-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                        </span>
                        <h3 class="font-medium leading-tight">{{ trans('main.personal-info') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.personal-info-details') }}</p>
                    </li>
                    <li class="mr-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        </span>
                        <h3 class="font-medium leading-tight">{{ trans('main.review') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.review-details') }}</p>
                    </li>
                </ol>

            </div>

            <div class="w-full sm:max-w-md lg:max-w-xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">

                    <x-validation-errors class="mb-4" />

                    <form method="POST" wire:submit.prevent="createUser" >
                        @csrf

                        <div>
                            <x-label for="name" value="{{ __('main.name') }}" />
                            <x-input id="name" class="block mt-1 w-full" wire:model.defer='name' type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" value="{{ __('main.email') }}" />
                            <x-input id="email" class="block mt-1 w-full" wire:model.defer='email' type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('main.password') }}" />
                            <x-input id="password" class="block mt-1 w-full" wire:model.defer='password' type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password_confirmation" value="{{ __('main.confirm-password') }}" />
                            <x-input id="password_confirmation" class="block mt-1 w-full" wire:model.defer='password_confirmation' type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>


                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center ">
                                        <x-checkbox name="terms" wire:model.defer='terms' class="mx-2" id="terms" required />

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





    @elseif ($currentStep === 2)


    <div class="pb-14 pt-7 flex">
        <div class="block px-[10%]  mt-[5%]">

            <ol class="relative text-gray-500 border-r border-gray-200 dark:border-gray-700 dark:text-gray-400">
                <li class="mb-10 mr-6">
                    <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400 absolute" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        <svg class="checkmark " viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" stroke-dasharray="48" stroke-dashoffset="48" />
                              </svg>
                    </span>
                    <h3 class="font-medium leading-tight">{{ trans('main.account-info') }}</h3>
                    <p class="text-sm pt-2">{{ trans('main.account-info-details') }}</p>
                </li>
                <li class="mb-10 mr-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                            <i class="fa-solid fa-user-shield"></i>
                    </span>
                    <h3 class="font-medium leading-tight">{{ trans('main.assign') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.assign-role-details') }}</p>
                </li>
                <li class="mb-10 mr-6">
                    <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                    </span>
                    <h3 class="font-medium leading-tight">{{ trans('main.personal-info') }}</h3>
                    <p class="text-sm pt-2">{{ trans('main.personal-info-details') }}</p>
                </li>
                <li class="mr-6">
                    <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </span>
                    <h3 class="font-medium leading-tight">{{ trans('main.review') }}</h3>
                    <p class="text-sm pt-2">{{ trans('main.review-details') }}</p>
                </li>
            </ol>

        </div>

                    <!-- The form is wrapped in a flex container which centers the content horizontally. -->
            <div class="w-full sm:max-w-md lg:max-w-xl mt-6  px-8  bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto flex items-center">

                <!-- This div specifies the width of the form on larger screens. -->
                    <div class=" w-full">
                        <!-- This heading is for the form title. It uses a large font size and is bold. -->
                        <h2 class="text-xl font-medium mb-4">{{ __('main.assign-role') }}</h2>

                        <form wire:submit.prevent="assignRole" method="post">
                            @csrf


                            <input type="hidden" wire:model.defer="user_created_id">

                            <div class="mb-4">
                            <label for="role_id" class="block text-gray-700 font-medium my-2">{{ __('main.role') }}</label>
                            <div class="relative">
                                <select id="role_id" wire:model.defer="role_id" name="role_id" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">{{__('main.select-role')}}</option>
                                @foreach ($roles as $role)
                                    @if($role->name !== "Admin")
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                                @error('role_id')
                                <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>


                            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary bg-gray-800 text-white w-full" >
                                {{ __('main.assign') }}
                                </button>
                            </div>
                            </div>
                        </form>

                </div>
            </div>

    </div>


    @elseif ($currentStep === 3)



        <div class="pb-14 pt-8 md:flex hs:block">
            <div class="block md:px-[2%]  mt-[5%]">
                <ol class="relative text-gray-500 border-r border-gray-200 dark:border-gray-700 dark:text-gray-400">
                    <li class="mb-10 mr-6 w-full">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400 absolute" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            <svg class="checkmark " viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" stroke-dasharray="48" stroke-dashoffset="48" />
                              </svg>
                        </span>
                        <h3 class="font-medium leading-tight">{{ trans('main.account-info') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.account-info-details') }}</p>
                    </li>
                    <li class="mb-10 mr-6">
                            <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                <i class="fa-solid fa-user-shield absolute"></i>
                                <svg class="checkmark" viewBox="0 0 52 52">
                                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" stroke-dasharray="48" stroke-dashoffset="48" />
                                  </svg>
                            </span>
                        <h3 class="font-medium leading-tight">{{ trans('main.assign') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.assign-role-details') }}</p>
                    </li>
                    <li class="mb-10 mr-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                        </span>
                        <h3 class="font-medium leading-tight">{{ trans('main.personal-info') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.personal-info-details') }}</p>
                    </li>
                    <li class="mr-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        </span>
                        <h3 class="font-medium leading-tight">{{ trans('main.review') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.review-details') }}</p>
                    </li>
                </ol>
            </div>




            @if($user_created_role == "Parent")
            @if($parentStep == 1)
            <div class="w-full sm:max-w-md lg:max-w-2xl mt-6 px-6 pt-4  pb-2 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
                <div class="pb-10 pt-2">
                    <div class="text-xl pb-4 pt-2">{{ trans('main.add-father-info') }}</div>
                    <form wire:submit.prevent="insertParentInfo" method="post">
                        @csrf
                        <input type="hidden" wire:model.defer="user_created_id">
                        @error('user_created_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
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
                                <div class="text-xl pb-4 pt-2">{{ trans('main.add-mother-info') }}</div>
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
                            <button type="submit" wire:click="insertParentInfo" class="btn btn-primary bg-gray-800 text-white w-[90%] mt-2" >
                                {{ __('main.add-the-info') }}
                            </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
            @endif
            @endif





            @if($user_created_role == "Teacher")
            <div class="w-full sm:max-w-md lg:max-w-2xl mt-0 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
                <div class="pb-10 pt-2">
                    <div class="text-xl pb-4 pt-2">{{ trans('main.add-teacher-info') }}</div>

                    <form wire:submit.prevent="insertTeacherInfo" method="post">
                        @csrf
                        <input type="hidden" wire:model.defer="user_created_id">

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
                              <script>
                                flatpickr("#joining_date", {
                                  dateFormat: "Y-m-d",
                                  onChange: function(selectedDates, dateStr, instance) {
                                    document.getElementById("joining_date").value = dateStr;
                                  }
                                });
                                </script>
                        </div>


                        <button type="submit" class="btn btn-primary bg-gray-800 text-white w-full mt-4" >
                            {{ __('main.add-the-info') }}
                        </button>
                    </form>

                </div>

            </div>
            @endif

            @if($user_created_role == "Student")
            <div class="w-full sm:max-w-md lg:max-w-2xl mt-0 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
                <div class="pb-10 pt-2 w-full">
                    <div class="text-xl pb-4 pt-2">{{ trans('main.add-student-info') }}</div>

                    <form wire:submit.prevent="insertStudentInfo" method="post">
                        @csrf
                        <input type="hidden" wire:model.defer="user_created_id">
                        @error('user_created_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror

                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" wire:model.defer="name_student" id="name_student" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                            <label for="name_student" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.name') }}</label>
                            @error('name_student')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" wire:model.defer="academic_year" id="academic_year" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" autocomplete="off" placeholder=" "  />
                                <label for="academic_year" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ trans('main.academic-year') }}</label>
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
                              <script>

                                          flatpickr("#date_birth", {
                                  dateFormat: "Y-m-d",
                                  onChange: function(selectedDates, dateStr, instance) {
                                    document.getElementById("date_birth").value = dateStr;
                                  }
                                });
                                </script>
                              </div>
                        </div>
                              <div class="relative" >
                                    <input type="text" id="search_parent" name="search" class="w-full search-input py-2 pl-10 pr-6 leading-tight text-gray-700 bg-white border border-gray-300 rounded-lg shadow-md appearance-none focus:outline-none focus:shadow-outline" autocomplete="off"  placeholder="{{__('main.search-parent')}}">
                                <div id="search-icon" class="absolute top-0 search-icon left-0 mt-2 ml-2 text-gray-400 cursor-pointer transform transition-transform ">
                                    <i class="fas fa-search"></i>
                                </div>
                                <input type="hidden" id="parent_id" wire:model.defer="parent_id" name="parent_id">
                                @error('parent_id')
                                    <div class="text-red-600 text-sm">{{ $message }}</div>
                                   @enderror
                                </div>

                                <div id="search-results" class="bg-white border border-gray-300 rounded-lg my-2 w-full"></div>



                        <button type="submit" wire:submit='insertStudentInfo' class="btn btn-primary bg-gray-800 text-white w-full mt-4" >
                            {{ __('main.add-the-info') }}
                        </button>
                    </form>

                </div>

            </div>

            @endif

        </div>



        @elseif ($currentStep === 4)



        <div class="pb-14 pt-8 flex ">
            <div class="block px-[2%]  mt-[5%]">
                <ol class="relative text-gray-500 border-r border-gray-200 dark:border-gray-700 dark:text-gray-400">
                    <li class="mb-10 mr-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400 absolute" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            <svg class="checkmark " viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" stroke-dasharray="48" stroke-dashoffset="48" />
                              </svg>
                        </span>
                        <h3 class="font-medium leading-tight">{{ trans('main.account-info') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.account-info-details') }}</p>
                    </li>
                    <li class="mb-10 mr-6">
                            <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                <i class="fa-solid fa-user-shield absolute"></i>
                                <svg class="checkmark" viewBox="0 0 52 52">
                                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" stroke-dasharray="48" stroke-dashoffset="48" />
                                  </svg>
                            </span>
                        <h3 class="font-medium leading-tight">{{ trans('main.assign') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.assign-role-details') }}</p>
                    </li>
                    <li class="mb-10 mr-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400 absolute" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                            <svg class="checkmark " viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" stroke-dasharray="48" stroke-dashoffset="48" />
                              </svg>
                        </span>
                        <h3 class="font-medium leading-tight">{{ trans('main.personal-info') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.personal-info-details') }}</p>
                    </li>
                    <li class="mr-6">
                        <span class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -right-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400 absolute" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <svg class="checkmark " viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" stroke-dasharray="48" stroke-dashoffset="48" />
                            </svg>
                        </span>
                        <h3 class="font-medium leading-tight">{{ trans('main.review') }}</h3>
                        <p class="text-sm pt-2">{{ trans('main.review-details') }}</p>
                    </li>
                </ol>
            </div>





            @if($user_created_role == "Parent")
            <div  class="w-full sm:max-w-md lg:max-w-2xl mt-6 px-6 pt-4  pb-2 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto border-4">
                <div class="pb-10 pt-2">
                    <div class="text-2xl py-2 border-b-2">{{ trans('main.parent-info') }}</div>
                    <div class="mt-6">
                        <div class="relative z-0  group  p-2 grid grid-cols-1 md:gap-6">
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg border-b-2 ">{{trans('main.father-name')}} :  <span class="text-sm font-normal"> {{$user->parent->Name_Father ?? "undefined"}} </span> </h4>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6  p-2">
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg  border-b-2">{{ trans('main.father-national-id') }} :  <span class="text-sm font-normal"> {{$user->parent->National_ID_Father ?? "undefined"}} </span> </h4>
                            </div>
                        <div class="relative z-0 w-full  group">
                            <h4 class="text-lg  border-b-2"> {{ trans('main.father-passport-id') }} :  <span class="text-sm font-normal"> {{$user->parent->Passport_ID_Father ?? "undefined"}} </span> </h4>
                        </div>
                        </div>
                        <div class="p-2 grid md:grid-cols-2 md:gap-6 ">
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg  border-b-2">  {{ trans('main.father-address') }} :  <span class="text-sm font-normal"> {{$user->parent->Address_Father ?? "undefined"}} </span> </h4>
                            </div>
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg  border-b-2"> {{ trans('father-phone') }} :  <span class="text-sm font-normal"> {{$user->parent->Phone_Father ?? "undefined"}} </span> </h4>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6 p-2">
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg border-b-2"> {{ trans('main.father-bloodtype') }} :  <span class="text-sm font-normal"> {{$user->parent->blood_type_father->name ?? "undefined"}} </span> </h4>
                            </div>
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg border-b-2"> {{ trans('main.father-nationality') }} :  <span class="text-sm font-normal"> {{$user->parent->nationality_father->name ?? "undefined"}} </span> </h4>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6 p-2">
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg border-b-2"> {{trans('main.father-religion')}} :  <span class="text-sm font-normal"> {{$user->parent->religion_father->name ?? "undefined"}} </span> </h4>
                            </div>
                            <div class="relative z-0 w-full group ">
                                <h4 class="text-lg border-b-2 ">  {{ trans('main.father-job') }} :  <span class="text-sm font-normal"> {{$user->parent->Job_Father ?? "undefined"}}</span> </h4>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <div class="relative z-0  group  p-2 grid grid-cols-1 md:gap-6">
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg border-b-2 "> {{ trans('main.mother-name') }} :  <span class="text-sm font-normal"> {{$user->parent->Name_Mother ?? "undefined"}} </span> </h4>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6  p-2">
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg  border-b-2">  {{ trans('main.mother-national-id') }} :  <span class="text-sm font-normal"> {{$user->parent->National_ID_Mother ?? "undefined"}} </span> </h4>
                            </div>
                        <div class="relative z-0 w-full  group">
                            <h4 class="text-lg  border-b-2"> {{ trans('main.mother-passport-id') }} :  <span class="text-sm font-normal"> {{$user->parent->Passport_ID_Mother ?? "undefined"}} </span> </h4>
                        </div>
                        </div>
                        <div class="p-2 grid md:grid-cols-2 md:gap-6 ">
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg  border-b-2"> {{ trans('main.mother-address') }} :  <span class="text-sm font-normal"> {{$user->parent->Address_Mother ?? "undefined"}} </span> </h4>
                            </div>
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg  border-b-2">  {{ trans('main.mother-phone') }} :  <span class="text-sm font-normal"> {{$user->parent->Phone_Mother ?? "undefined"}} </span> </h4>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6 p-2">
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg border-b-2"> {{ trans('main.mother-bloodtype') }} :  <span class="text-sm font-normal"> {{$user->parent->blood_type_mother->name ?? "undefined"}} </span> </h4>
                            </div>
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg border-b-2">  {{ trans('main.mother-nationality') }} :  <span class="text-sm font-normal"> {{$user->parent->nationality_mother->name ?? "undefined"}} </span> </h4>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6 p-2">
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg border-b-2">  {{ trans('main.mother-religion') }} :  <span class="text-sm font-normal"> {{$user->parent->religion_mother->name ?? "undefined"}} </span> </h4>
                            </div>
                            <div class="relative z-0 w-full group ">
                                <h4 class="text-lg border-b-2 ">  {{ trans('main.mother-job') }} :  <span class="text-sm font-normal"> {{$user->parent->Job_Mother ?? "undefined"}}</span> </h4>
                            </div>
                        </div>
                    </div>
                </div>
                              <div class="col-md-6 offset-md-4">
                                <a href="{{route('users.add')}}"  class="btn btn-primary bg-gray-800 text-white w-full" >
                                {{ __('main.finish') }}
                                </a>
                            </div>
        </div>
            @endif

            @if($user_created_role == "Teacher")

                <div  class="w-full sm:max-w-md lg:max-w-2xl mt-6 px-6 pt-4  pb-2 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto border-4">
                    <div class="pb-10 pt-2">
                        <div class="text-2xl py-2 border-b-2">{{ trans('main.teacher-info') }}</div>
                        <div class="mt-6">
                            <div class="relative z-0  group  p-2 grid grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg border-b-2 ">{{ trans('main.name') }} :  <span class="text-sm font-normal"> {{$user->teacher->teacher_name ?? "undefined"}} </span> </h4>
                                </div>
                                <div class="relative z-0 w-full  group">
                                <h4 class="text-lg  border-b-2">{{ trans('main.national-id') }} :  <span class="text-sm font-normal"> {{$user->teacher->national_id_teacher ?? "undefined"}} </span> </h4>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6  p-2">
                            <div class="relative z-0 w-full group ">
                                <h4 class="text-lg border-b-2 "> {{ trans('main.joining-date') }} :  <span class="text-sm font-normal"> {{$user->teacher->joining_date ?? "undefined"}} </span> </h4>
                            </div>
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg  border-b-2"> {{ trans('main.passport-id') }} :  <span class="text-sm font-normal"> {{$user->teacher->passport_id_teacher ?? "undefined"}} </span> </h4>
                            </div>
                            </div>
                            <div class="p-2 grid md:grid-cols-2 md:gap-6 ">
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg  border-b-2"> {{ trans('main.specialization') }} :  <span class="text-sm font-normal"> {{$user->teacher->specialization->name ?? "undefined"}} </span> </h4>
                                </div>
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg  border-b-2">{{ trans('main.phone') }} :  <span class="text-sm font-normal"> {{$user->teacher->phone_teacher ?? "undefined"}} </span> </h4>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6 p-2">
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg border-b-2"> {{ trans('main.blood-type') }} :  <span class="text-sm font-normal"> {{$user->teacher->blood_type->name ?? "undefined"}} </span> </h4>
                                </div>
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg border-b-2"> {{ trans('main.nationality') }} :  <span class="text-sm font-normal"> {{$user->teacher->nationality->name ?? "undefined"}} </span> </h4>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6 p-2">
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg border-b-2"> {{ trans('main.religion') }} :  <span class="text-sm font-normal"> {{$user->teacher->religion->name ?? "undefined"}} </span> </h4>
                                </div>
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg border-b-2"> {{ trans('main.gender') }} :  <span class="text-sm font-normal"> {{$user->teacher->gender->name?? "undefined"}} </span> </h4>
                                </div>
                            </div>

                        </div>

                </div>
                       <div class="col-md-6 offset-md-4">
                                <a href="{{route('users.add')}}"  class="btn btn-primary bg-gray-800 text-white w-full" >
                                {{ __('main.finish') }}
                                </a>
                            </div>
            </div>


            @endif
            @if($user_created_role == "Student")

                <div  class="w-full sm:max-w-md lg:max-w-2xl mt-6 px-6 pt-4  pb-2 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto border-4">
                    <div class="pb-10 pt-2">
                        <div class="text-2xl py-2 border-b-2">{{ trans('main.student-infp') }}</div>
                        <div class="mt-6">
                            <div class="relative z-0  group  p-2 grid grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg border-b-2 ">{{ trans('main.studentname') }} :  <span class="text-sm font-normal"> {{$user->student->name ?? "undefined"}} </span> </h4>
                                </div>
                                <div class="relative z-0 w-full  group">
                                <h4 class="text-lg  border-b-2"> {{ trans('main.grade') }} :  <span class="text-sm font-normal"> {{$user->student->grade->name ?? "undefined"}} </span> </h4>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6  p-2">
                            <div class="relative z-0 w-full group ">
                                <h4 class="text-lg border-b-2 "> {{ trans('main.classoom') }} :  <span class="text-sm font-normal"> {{$user->student->classroom->name?? "undefined"}} </span> </h4>
                            </div>
                            <div class="relative z-0 w-full  group">
                                <h4 class="text-lg border-b-2"> {{ trans('main.student-email') }} :  <span class="text-sm font-normal"> {{$user->email ?? "undefined"}} </span> </h4>
                            </div>
                            </div>
                            <div class="p-2 grid md:grid-cols-2 md:gap-6 ">
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg  border-b-2"> {{ trans('main.academic-year') }} :  <span class="text-sm font-normal"> {{$user->student->academic_year ?? "undefined"}} </span> </h4>
                                </div>
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg  border-b-2"> {{ trans('main.date-birth') }} :  <span class="text-sm font-normal"> {{$user->student->date_birth ?? "undefined"}} </span> </h4>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6 p-2">
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg border-b-2"> {{ trans('main.blood-type') }} :  <span class="text-sm font-normal"> {{$user->student->blood_type->name ?? "undefined"}} </span> </h4>
                                </div>
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg border-b-2"> {{ trans('main.nationality') }} :  <span class="text-sm font-normal"> {{$user->student->nationality->name ?? "undefined"}} </span> </h4>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6 p-2">
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg border-b-2"> {{ trans('main.religion') }} :  <span class="text-sm font-normal"> {{$user->student->religion->name ?? "undefined"}} </span> </h4>
                                </div>
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg border-b-2"> {{ trans('main.gender') }} :  <span class="text-sm font-normal"> {{$user->student->gender->name?? "undefined"}} </span> </h4>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6 p-2">
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg border-b-2"> {{ trans('main.mother-name') }} :  <span class="text-sm font-normal"> {{$user->student->parent->Name_Mother ?? "undefined"}} </span> </h4>
                                </div>
                                <div class="relative z-0 w-full  group">
                                    <h4 class="text-lg  border-b-2"> {{ trans('main.father-name') }} :  <span class="text-sm font-normal"> {{$user->student->parent->Name_Father ?? "undefined"}} </span> </h4>
                                </div>
                            </div>

                        </div>

                </div>
                       <div class="col-md-6 offset-md-4">
                                <a href="{{route('users.add')}}"  class="btn btn-primary bg-gray-800 text-white w-full" >
                                {{ __('main.finish') }}
                                </a>
                            </div>
            </div>


            @endif



    @endif

        </div>


{{-- Import Search Users and add user_id inside hidden input --}}
<script type="module">

    import { setupSearchParents } from "{{ asset('search.js') }}";

    // Get the input elements
    Livewire.on('parentSearched', function() {
        let searchInput = document.getElementById('search_parent');
        let userIdInput = document.getElementById('parent_id');

        // Add Search for Users Function
        setupSearchParents(searchInput, userIdInput);
    });
</script>

</div>

