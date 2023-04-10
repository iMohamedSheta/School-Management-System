


@extends('layouts.master')
@section('Pagetitle',"Discussions")


@section('Content')

<div class="md:w-[70%] m-auto my-9 p-6 bg-white sm:rounded-lg shadow-xl hs:w-full ">
    <form method="post" action="{{route('posts.save')}}" enctype="multipart/form-data">
        @csrf
        <label for="ckeditor" class="block font-500 mb-4 text-3xl font-medium text-gray-900 dark:text-white">{{ trans('main.add-discussion') }}</label>
        @if($errors->any())
        <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-2 py-3 rounded flex flex-row-reverse justify-between " role="alert">
                <button class="close-btn text-4xl flex items-start mx-2" onclick="this.parentElement.style.display='none'">&times;</button>
            <div>
                @foreach ($errors->all() as $error)
                <div class="flex items-center m-1">
                    <strong><i class="fas fa-exclamation-triangle mr-2 px-1"></i></strong>

                    <p class="">{{ $error }}</p>
                </div>
                @endforeach
            </div>
        </div>
    @endif
        <div class="relative ">
            <input type="text" name="title"  id="floating_outlined" wire:model="search" value="{{old('title')}}" class="search-input block px-4 pb-3 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_outlined"  class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 right-1">{{trans('main.title')}}</label>
            </div>


        <textarea id="ckeditor"  rows="3" name="content" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border
         border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
         dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{trans('main.discussion-content')}}">{{old('content')}}</textarea>
        <button  class="btn btn-dark w-full mt-2">{{ trans('main.publish') }}</button>
    </form>
</div>
<livewire:post-component>


@endsection

@section('scripts')
    <script>
        const imageUploadRoute = "{{route('posts.image-upload')}}";
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    </script>

<script>
    // Add click event listener to copy link buttons
    const copyBtns = document.querySelectorAll('.copy-link-btn');
    copyBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        const url = btn.dataset.url;

        // Create temporary input element to copy URL
        const tempInput = document.createElement('input');
        tempInput.setAttribute('value', url);
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        // Change button text to "Copied!" and then revert it back after a short delay
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check mx-1"></i> {{trans("main.copied")}}';
        setTimeout(() => {
          btn.innerHTML = originalText;
        }, 1000);
      });
    });
  </script>
@endsection
