




@extends('layouts.master')

@section('Content')
<!-- The form is wrapped in a flex container which centers the content horizontally. -->
<div class="flex justify-center bg-white sm:rounded-lg shadow-xl ">

    <!-- This div specifies the width of the form on larger screens. -->
    <div class="w-full lg:w-8/12 md:py-12 hs:py-2 hs:m-6">

            <!-- This heading is for the form title. It uses a large font size and is bold. -->
            <h2 class="text-xl font-medium mb-4">{{ __('main.assign-roles') }}</h2>

            <form method="post" action="{{ route("user-role.assign") }}">
                @csrf
                <label for="search_users" class="my-2">{{__('main.user')}} </label>
                   <div class="relative">
                         <input type="text" id="search_users" name="search" class="w-full search-input py-2 pl-10 pr-6 leading-tight text-gray-700 bg-white border border-gray-300 rounded-lg shadow-md appearance-none focus:outline-none focus:shadow-outline" autocomplete="off"  placeholder="{{__('main.select-user')}}">
                        <div id="search-icon" class="absolute top-0 search-icon left-0 mt-2 ml-2 text-gray-400 cursor-pointer transform transition-transform ">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="hidden" id="user_id" name="user_id">
                  </div>

                  <div id="search-results" class="bg-white border border-gray-300 rounded-lg my-2 w-full"></div>



                <div class="mb-4">
                  <label for="role_id" class="block text-gray-700 font-medium my-2">{{ __('main.role') }}</label>
                  <div class="relative">
                    <select id="role_id" name="role_id" class="block appearance-none w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option value="">{{__('main.select-role')}}</option>
                      @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                      @endforeach
                    </select>
                    @error('role_id')
                      <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    </div>
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary bg-gray-800 text-white w-full">
                      {{ __('main.assign') }}
                    </button>
                  </div>
                </div>
              </form>

    </div>
</div>



{{-- Import Search Users and add user_id inside hidden input --}}
<script type="module">

    import { setupSearchUsers } from "{{ asset('search.js') }}";

    // Get the input elements
    let searchInput = document.getElementById('search_users');
    let userIdInput = document.getElementById('user_id');

    // Add Search for Users Function
    setupSearchUsers(searchInput, userIdInput);
  </script>



@endsection
