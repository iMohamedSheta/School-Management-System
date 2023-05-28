





<div class="inline-flex">
    <button wire:click ="openModalToShowInfo"   class="mx-2">
        <i class="fa-solid fa-file-lines fa-lg hover:text-gray-800"></i>
    </button>


<!-- Show Info modal -->
<x-dialog-modal wire:model="openModal"  >
    <x-slot name="title">
        {{ trans('main.audit-info',['name'=>$audit->user->name]) }}
    </x-slot>

    <x-slot name="content">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div >
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex justify-between">
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-gray-900">{{ trans('main.audit-info',['name'=>$audit->user->name]) }}</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ trans('main.audit-info-description',['name'=>$audit->user->name,'type'=>$audit->event,'table'=>$audit->auditable_type]) }}</p>
                    </div>
                    </div>
                </div>
                <div class="border-t border-gray-200 two-columns-print">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{trans('main.name')}}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$audit->user->name ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.email') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 font-mono font-bold">{{ $audit->user->email ??  trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.event-type') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            @if($audit->event == 'created')
                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                                    {{ trans('main.created') }}
                                </span>
                            @elseif ($audit->event == 'deleted')
                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">
                                    {{ trans('main.deleted') }}
                                </span>
                            @elseif ($audit->event == 'updated')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">
                                    {{ trans('main.updated') }}
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                    {{$audit->event}}
                                </span>
                            @endif
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.auditable-type') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-purple-400 border border-purple-400">
                                {{ $audit->auditable_type ?? '-' }}
                            </span>
                        </dd>
                    </div>
                    @if (!in_array($audit->event, ['created']))
                    <div class="bg-gray-50 break-words px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.old-values') }}</dt>
                        <div class=" p-2 text-sm text-white sm:col-span-2 sm:mt-0 bg-red-600 ">
                            <dd class="">
                                @if ($audit->old_values)
                                    @php
                                        $oldValues = json_decode($audit->old_values, true);
                                    @endphp
                                    <ul>
                                        @foreach ($oldValues as $key => $value)
                                            <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    {{ trans('main.undefined') }}
                                @endif
                            </dd>
                        </div>
                    </div>
                    @endif
                    @if (!in_array($audit->event, ['deleted']))
                    <div class="bg-gray-50 break-words px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.new-values') }}</dt>
                        <div class=" p-2 text-sm text-white sm:col-span-2 sm:mt-0 bg-green-500 ">
                            <dd class="">
                                @if ($audit->new_values)
                                    @php
                                        $newValues = json_decode($audit->new_values, true);
                                    @endphp
                                    <ul>
                                        @foreach ($newValues as $key => $value)
                                            <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    {{ trans('main.undefined') }}
                                @endif
                            </dd>
                        </div>
                    </div>
                    @endif

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.url') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$audit->url ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.ip-address') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$audit->ip_address ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.user-agent') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$audit->user_agent ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.tags') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$audit->tags ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.created-at') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{MyCarbon::parse($audit->created_at)->format('d-m-Y') ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.updated-at') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{MyCarbon::parse($audit->updated_at)->format('d-m-Y') ?? trans('main.undefined')}}</dd>
                    </div>

                </dl>
                </div>
                </div>
            </div>

            </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$toggle('openModal')" wire:loading.attr="disabled">
            {{ trans('main.close') }}
        </x-secondary-button>
    </x-slot>


</x-dialog-modal>
</div>


