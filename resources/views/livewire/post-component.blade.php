


<div class="p-6 border-y-8 rounded-2xl sm:rounded-lg ">

{{--
    {{-- <input wire:model="search" type="text" class="form-input w-full" placeholder="Search...">
    <div class="bg-white p-4 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="search-icon transition mx-6  w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="relative ">
            <input type="search" id="floating_outlined" wire:model="search" class="search-input block px-4 pb-3 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_outlined"  class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 right-1">{{trans('main.search')}}</label>
            </div>
            {{-- <input type="text"  wire:model="search" id="simple-search" class=" search-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" >
        </div>
    </div> --}}

@forelse ($posts as $post)

<div class=' md:w-[90%] mx-auto my-8 hs:w-full  '>
    <div class="max-w-2xl mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="border-b-4">
            <div class="flex justify-between items-center bg-white rounded-lg  px-3 pt-4 pb-2 max-w-2xl mx-auto">

                <div class="flex items-center" data-popover-target="popover-user-profile-{{$post->user->id}}" >
                    <div class="relative">
                        <img class="object-cover mx-1 w-10 h-10 rounded-full" src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" />
                        {{-- <span class="bottom-0 left-7 absolute  w-3.5 h-3.5 bg-green-500 border-2 border-white dark:border-gray-800 rounded-full"></span> --}}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-md font-semibold text-gray-900 truncate dark:text-white">
                            {{$post->user->name}}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{$post->created_at->diffForHumans()}}
                        </p>
                    </div>
                </div>
                <div data-popover id="popover-user-profile-{{$post->user->id}}" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                    <div class="p-3">
                        <div class="flex items-center justify-between mb-2">
                            <a href="#">
                                <div class="relative">
                                    <img class="object-cover mx-1 w-10 h-10 rounded-full" src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" />
                                    {{-- <span class="bottom-0 left-7 absolute  w-3.5 h-3.5 bg-green-500 border-2 border-white dark:border-gray-800 rounded-full"></span> --}}
                                </div>
                            </a>
                        </div>
                        <p class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                            <a href="#">{{$post->user->name}}</a>
                        </p>
                        <p class="mb-3 text-sm font-normal">
                            <a href="#" class="hover:underline" dir="ltr">{{$post->user->email}}</a>
                        </p>
                        <p class="mb-3 text-sm font-normal">
                            <a href="#" class="hover:underline">
                                @foreach ($post->user->roles as $role)
                                    @if($role->name == 'Admin')
                                    <span class="bg-pink-100 text-pink-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300 hover:underline inline-block">@ {{ $role->name }}</span>
                                    @elseif ($role->name == 'Teacher')
                                    <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300 hover:underline inline-block">@ {{ $role->name }}</a></span>
                                    @elseif ($role->name == 'Student')
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 hover:underline inline-block">@ {{ $role->name }}</a></span>
                                    @else
                                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300 hover:underline inline-block">@ {{ $role->name }}</a></span>
                                    @endif


                                @endforeach
                            </a>
                        </p>
                        <p class="mb-4 text-sm font-light">{{ trans('main.user-info-test') }} <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">EdTech</a></p>
                    </div>
                    <div data-popper-arrow></div>
                </div>
                <div class="flex flex-row-reverse justify-center items-center">
                    <div>
                        <button id="dropdownMenuIconHorizontalButton-{{$post->id}}" data-dropdown-toggle="dropdownDotsHorizontal-{{$post->id}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownDotsHorizontal-{{$post->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton-{{$post->id}}">
                                <li>
                                    <!-- Copy link button for this post -->
                                    <button class="copy-link-btn w-full px-4 py-2 hover:bg-gray-100  dark:hover:bg-gray-600 dark:hover:text-white"" data-url="{{ route('post.show', $post->id) }}">
                                        <i class="fas fa-copy mx-1"></i> {{trans('main.copy-link')}}
                                    </button>
                                    </li>
                                <li>
                                    <a href="{{route('post.show',$post->id)}}" class="flex justify-center w-full  px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ trans('main.discussion-post-page') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                        <div>
                            @if((Auth::user()->id == $post->user->id) || (auth()->user()->isAdmin()))
                            <button class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button" data-modal-target="delete-post-{{$post->id}}" id="delete-post-btn-{{$post->id}}"  data-modal-toggle="delete-post-{{$post->id}}">
                                <i class="fa-regular fa-trash-can  fa-xl"></i>
                            </button>
                            <div>
                                <div id="delete-post-{{$post->id}}" tabindex="-1" aria-hidden="true" class="fixed top-1/2 left-1/2  z-50 hidden max-md:w-screen max-md:h-screen md:py-[15%] md:px-[32%] overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="delete-post-{{$post->id}}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <form action="{{route('posts.destroy')}}" method="post">
                                            @method("delete")
                                            @csrf
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{trans('main.delete-post-msg')}}</h3>
                                            <input class="text" type="hidden" id="post_id-{{$post->id}}" name="post_id" value="{{$post->id}}">
                                            <button data-modal-hide="delete-post-{{$post->id}}" type="submit" id="delete-selected-btn" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                {{trans('main.confirm')}}
                                            </button>
                                            <button data-modal-hide="delete-post-{{$post->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">{{trans('main.cancel')}}</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endif
                        </div>
                    </div>
            </div>
        </div>
    <div data-modal-target="defaultModal-{{$post->id}}" data-modal-toggle="defaultModal-{{$post->id}}"  >
        @if(!empty($post->getFirstMediaUrl('Postsimages')))
        <img aria-hidden="true" class=" w-auto mx-auto pb-2 max-h-[50vh]" src="{{ $post->getFirstMediaUrl('Postsimages') }}" alt="Post image">
    @endif
    </div>
    <div id="defaultModal-{{$post->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full  overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-4xl md:h-auto">
            <div class="relative rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between  rounded-t dark:border-gray-600">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm  ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal-{{$post->id}}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div>
                    @if(!empty($post->getFirstMediaUrl('Postsimages')))
                        <img aria-hidden="true" class=" w-auto mx-auto  max-h-[80vh]" src="{{ $post->getFirstMediaUrl('Postsimages') }}" alt="Post image">
                    @endif
            </div>
        </div>
    </div>
    </div>
    <div class="px-5 py-2">
        <a href="#">
                <h5 class="mb-2 text-2xl pb-2 border-b font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
        </a>
            <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                {!! preg_replace('/<img[^>]+>/i', '', $post->content) !!}
            </p>
    </div>
    <div class="px-4 py-1 flex justify-start">
        <button wire:click="upvote({{$post->id}})" class=" px-2 py-3 flex  focus:active:text-gray-800 focus:text-gray-800 items-center ">
            <i class="fa-sharp fa-solid fa-caret-up fa-2xl p-1 " style="font-size: 65px;"></i>
                        <span class="sr-only">Icon description</span>
                    </button>
                    <div class="ml-2 flex justify-center items-center " style="font-size:18px">
                    {{$post->count_upvotes}}
                    </div>
        <button wire:click="downvote({{$post->id}})"  class=" px-1 py-3 mb-3    flex items-center focus:active:text-red-600 focus:text-red-600">
            <i class="fa-sharp fa-solid fa-caret-down fa-2xl p-1" style="font-size:65px"></i>
            <span class="sr-only">Icon description</span>
        </button>
        <div class="ml-2 flex justify-center items-center" style="font-size:18px">
            {{$post->count_downvotes}}
        </div>
    </div>
    <div class="px-5 py-1">
        <div class="border-t-2 mb-4"></div>
        <ul class="my-2">
            @forelse($post->comments as $comment)
            @if ($loop->index < $this->commentsShown)
            {{-- User Comment Pop up --}}
            <div data-popover id="popover-user-profile-{{$comment->user->id}}" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                <div class="p-3">
                    <div class="flex items-center justify-between mb-2">
                        <a href="#">
                            <div class="relative">
                                <img class="object-cover mx-1 w-10 h-10 rounded-full" src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}" />
                            </div>
                        </a>
                    </div>
                    <p class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                        <a href="#">{{$comment->user->name}}</a>
                    </p>
                    <p class="mb-3 text-sm font-normal">
                        <a href="#" class="hover:underline" dir="ltr">{{$comment->user->email}}</a>
                    </p>
                    <p class="mb-3 text-sm font-normal">
                        <a href="#" class="hover:underline">
                            @foreach ($comment->user->roles as $role)
                                @if($role->name == 'Admin')
                                <span class="bg-pink-100 text-pink-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300 hover:underline inline-block">@ {{ $role->name }}</span>
                                @elseif ($role->name == 'Teacher')
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300 hover:underline inline-block">@ {{ $role->name }}</a></span>
                                @elseif ($role->name == 'Student')
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 hover:underline inline-block">@ {{ $role->name }}</a></span>
                                @else
                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300 hover:underline inline-block">@ {{ $role->name }}</a></span>
                                @endif


                            @endforeach
                        </a>
                    </p>
                    <p class="mb-4 text-sm font-light">{{ trans('main.user-info-test') }} <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">EdTech</a></p>
                </div>
                <div data-popper-arrow></div>
            </div>

            <li class="flex ">
                <div class="w-1/12 pt-3" >
                    <div class=" flex items-center justify-end mt-1" data-popover-target="popover-user-profile-{{$comment->user->id}}">
                        <img class="object-cover mx-1 w-10 h-10 rounded-full" src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }} image" />
                        <div class="flex hs:inline-block md:flex">
                        </div>
                    </div>
                </div>
                <div class="w-11/12 relative border-2 shadow-lg my-3 rounded-2xl px-3 pb-3 pt-1 mx-2">
                    <div class="">
                        <div class="inline-block" data-popover-target="popover-user-profile-{{$comment->user->id}}">
                            <p class="text-gray-500 text-md font-bold ">{{$comment->user->name}} </p>
                        </div>
                        <div>
                            <p class="text-gray-900 dark:text-white break-words">
                                @if(strlen($comment->comment) > 255)
                                    @if ($showMore)
                                        {{ $comment->comment }}
                                        <a href="#" wire:click.prevent="toggleShowMore" class="text-blue-500 hover:underline">{{ trans('main.show-less') }}</a>
                                    @else
                                        {{ Str::limit($comment->comment, 255, '...') }}
                                        <a href="#" wire:click.prevent="toggleShowMore" class="text-blue-500 hover:underline">{{ trans('main.show-more') }}</a>
                                    @endif
                                    @else
                                    {{ $comment->comment }}
                                    @endif
                                </p>
                            </div>
                            <p class=" text-gray-500 text-sm mt-1">{{$comment->created_at->diffForHumans()}}</p>

                        @if( (Auth::user()->id ==$comment->user->id) || (Auth::user()->id == $post->user->id) || (auth()->user()->isAdmin()) )
                        <div class="absolute top-0 {{ in_array(app()->getLocale(), ['ar', 'he', 'fa', 'ur']) ? 'left-0' : 'right-0'}} ">
                            <button id="dropdownCommentbtn-{{$comment->id}}" data-dropdown-toggle="dropdownComment-{{$comment->id}}" class="inline-flex pt-4 px-4 items-center  text-sm font-medium text-center text-gray-900 bg-white rounded-lg focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                            </button>
                            
                            <!-- Dropdown comment menu -->
                            <div id="dropdownComment-{{$comment->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-2xl w-12 dark:bg-gray-700 dark:divide-gray-600">
                                @if( (Auth::user()->id ==$comment->user->id))
                                <ul class=" text-sm text-gray-700 dark:text-gray-200 " aria-labelledby="dropdownCommentbtn-{{$comment->id}}">
                                    <li>
                                        <button data-modal-target="editcomment-modal-{{$comment->id}}" data-modal-toggle="editcomment-modal-{{$comment->id}}" class="block text-center w-full px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i class="fa-solid fa-pencil "></i></button>
                                    </li>
                                </ul>
                                @endif
                                    <div class="">
                                        <button type="button" wire:click='deleteComment({{$comment->id}})' class="block w-full px-4 py-3 text-sm rounded-b-lg text-white bg-red-600 hover:bg-red-500 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i class="fa-solid fa-trash "></i></button>
                                    </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    </div>

                </li>

                        @if( (Auth::user()->id == $comment->user->id))
                            <!-- edit comment modal -->
                            <div id="editcomment-modal-{{$comment->id}}" tabindex="-1" aria-hidden="true" class="fixed  top-0 left-0 right-0 z-999 hidden w-full md:py-[15%] md:px-[32%] overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                    <div class="relative w-full h-full max-w-2xl md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 ">
                                            <button type="button" class="absolute top-3 {{ in_array(app()->getLocale(), ['ar', 'he', 'fa', 'ur']) ? 'left-2.5' : 'right-2.5' }}  text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="editcomment-modal-{{$comment->id}}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="px-6 py-6 lg:px-8">
                                                <div>
                                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white"><i class="fa-solid fa-pencil mx-1"></i> {{ trans('main.edit-comment') }}</h3>
                                                </div>
                                                <form class="space-y-6" action="#">
                                                    <div>
                                                        <textarea id="message" rows="4" class="block p-2.5  w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$comment->comment}}</textarea>
                                                    </div>
                                                    <button class="btn btn-dark w-full"><i class="fa-solid fa-pencil mx-1"></i> {{trans('main.edit')}} </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endif
            @endif
                @empty
                    {{ trans('main.no-comments') }}
                @endforelse
                @if($this->commentsShown < $post->comments->count())
                    <button wire:click="showMoreComments()" class="btn btn-dark px-4 py-2 mt-4 flex items-center"><i class="fa-solid fa-plus mx-2 "></i>{{ trans('main.show-more') }}</button>
                @endif

                </ul>
                <form wire:submit.prevent="addComment({{$post->id}})">
                    <div class="flex flex-col my-4">
                        <textarea wire:model.defer="comment" class="form-input rounded-md shadow-sm mt-1 block w-full border-gray-300" rows="1" placeholder="{{trans('main.add-comment')}}"></textarea>
                        <button class="btn btn-dark px-4 py-2 mt-4"><i class="fa-solid fa-message mx-2 fa-lg"></i>{{ trans('main.comment') }}</button>
                    </div>
                </form>
            </div>
</div>





</div>

       @empty
        {{ trans('main.no-discussions') }}
       @endforelse
<div class="bg-white sm:rounded-lg shadow-xl p-6">
{{$posts->render()}}
</div>

</div>






