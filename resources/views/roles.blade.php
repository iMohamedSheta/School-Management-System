




@extends('layouts.master')

@section('Content')
       <!-- The form is wrapped in a flex container which centers the content horizontally. -->
<div class="flex justify-center">

    <!-- This div specifies the width of the form on larger screens. -->
    <div class="w-full lg:w-8/12 py-12">

            <!-- This heading is for the form title. It uses a large font size and is bold. -->
            <h2 class="text-xl font-medium mb-4">{{ __('Assign Roles') }}</h2>

            <!-- This form element sends the form data to the 'user-role.assign' route when submitted. -->
            <form method="POST" action="{{ route('user-role.assign') }}">
                @csrf

                <!-- This div contains a label and a dropdown menu to select a user. -->
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-medium">{{ __('User') }}</label>
                    <div class="relative">
                        <select id="user_id" name="user_id" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">-- Select User --</option>
                            <!-- This loop populates the dropdown with user names and ids. -->
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <!-- This shows an error message if there is an error with the user selection. -->
                        @error('user_id')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <!-- This is a dropdown icon on the right side of the dropdown menu. -->
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12l-5-5 1.41-1.41L10 9.17l3.59-3.58L15 7l-5 5z"/></svg>
                        </div>
                    </div>
                </div>

                <!-- This div contains a label and a dropdown menu to select a role. -->
                <div class="mb-4">
                    <!-- Label for Role selection -->
                    <label for="role_id" class="block text-gray-700 font-medium">{{ __('Role') }}</label>
                    <div class="relative">
                        <!-- Dropdown menu for selecting a Role -->
                        <select id="role_id" name="role_id" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">-- Select Role --</option>
                            <!-- Loop through roles and add them as options in the dropdown -->
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <!-- Display an error message if there is an error with Role selection -->
                        @error('role_id')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                        <!-- Display a dropdown icon -->
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12l-5-5 1.41-1.41L10 9.17l3.59-3.58L15 7l-5 5z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <!-- Submit button for assigning the selected Role -->
                    <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary bg-gray-800 text-white w-full">
                        {{ __('Assign Role') }}
                      </button>
                    </div>
                  </div>


            </form>
    </div>
</div>


@endsection
