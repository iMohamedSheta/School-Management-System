




@extends('layouts.master')

@section('Content')
       <!-- The form is wrapped in a flex container which centers the content horizontally. -->
<div class="flex justify-center">

    <!-- This div specifies the width of the form on larger screens. -->
    <div class="w-full lg:w-8/12 py-12">

            <!-- This heading is for the form title. It uses a large font size and is bold. -->
            <h2 class="text-xl font-medium mb-4">{{ __('main.assign-roles') }}</h2>

            <form method="post" action="{{ route("user-role.assign") }}">
                @csrf
                <label for="search" class="my-2">{{__('main.user')}} </label>
                    <div class="relative">
                        <input type="text" id="search" name="search" class="w-full py-2 pl-10 pr-6 leading-tight text-gray-700 bg-white border border-gray-300 rounded-lg shadow-md appearance-none focus:outline-none focus:shadow-outline" placeholder="{{__('main.select-user')}}">
                        <div id="search-icon" class="absolute top-0 left-0 mt-2 ml-2 text-gray-400 cursor-pointer">
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


<script>
    // Get the input elements
    let searchInput = document.getElementById('search');
    let userIdInput = document.getElementById('user_id');

    // Attach an event listener to the input element
    searchInput.addEventListener('input', function() {
    // Get the search query
    let query = this.value;

    // Send an AJAX request to the server
    axios.get('/user/search', {
        params: {
        q: query
        }
    })
    .then(response => {
        // Get the search results
        let results = response.data;

        // Show the search results in the results div
        let resultsDiv = document.getElementById('search-results');
        resultsDiv.innerHTML = '';

        // Create a list of suggestions
        let suggestionsList = document.createElement('ul');
        suggestionsList.classList.add('bg-white', 'border', 'border-gray-300', 'rounded-lg', 'mt-2', 'w-full');
        for (let i = 0; i < results.length; i++) {
        let result = results[i];
        let suggestionItem = document.createElement('li');
        suggestionItem.textContent = result.name;
        suggestionItem.classList.add('px-4', 'py-2', 'cursor-pointer', 'hover:bg-gray-100');

        // Add a click event listener to update the search input's value and the hidden input's value when a suggestion is clicked
        suggestionItem.addEventListener('click', function() {
            searchInput.value = result.name;
            userIdInput.value = result.id;
            resultsDiv.innerHTML = '';
        });

        suggestionsList.appendChild(suggestionItem);
        }

        resultsDiv.appendChild(suggestionsList);
    })
    .catch(error => {
        console.error(error);
    });
    });

    const searchIcon = document.getElementById('search-icon');
    const clearIcon = document.querySelector('.fa-times-circle');

    searchIcon.addEventListener('click', function() {
    searchInput.focus();
    });

    searchInput.addEventListener('input', function() {
    if (searchInput.value !== '') {
        clearIcon.classList.remove('hidden');
    } else {
        clearIcon.classList.add('hidden');
    }
    });


</script>

@endsection
