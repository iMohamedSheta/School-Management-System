
<div class="sm:flex justify-around hs:block  ">
    @forelse ($childern as $child )
            <div class="sm:w-full hs:w-auto max-w-lg pt-14 my-8 mx-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <div class="flex flex-col items-center pb-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ $child->user->profile_photo_url }}" alt="{{ $child->user->name }}" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                        {{$child->name}}
                    </h5>
                    <span class="bg-blue-100 my-2 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{$child->user->roles->first()->name}}</span>
                    </span>
                    <div class="flex flex-col ">
                        <div class="flex m-2">
                            {{ trans('main.grade') }} :
                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{$child->grade->name}}</span>
                            </span>
                        </div>
                        <div class="flex m-2">
                            {{ trans('main.classroom') }} :
                            <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-purple-400 border border-purple-400">
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{$child->classroom->name}}</span>
                            </span>
                        </div>
                    </div>


                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <a href="{{route('student.info',$child->id)}}" target="_blank" class="block px-4 py-2 rounded border border-gray-500 bg-gray-800 text-sm text-white hover:bg-gray-100 hover:text-gray-900"><i class="mx-2 fa-solid fa-file-lines fa-lg hover:text-gray-800"></i>{{ trans('main.student-info-dropdown') }}</a>
                    </div>
                </div>
            </div>
    @empty
            none
    @endforelse
</div>
