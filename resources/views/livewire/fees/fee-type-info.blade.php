





<div class="inline-flex">
    <button wire:click ="openModalToShowInfo"  target="_blank" class="mx-2">
        <i class="fa-solid fa-file-lines fa-lg hover:text-gray-800"></i>
    </button>


<!-- Show Info modal -->
<x-dialog-modal wire:model="openModal"  >
    <x-slot name="title">
        {{ trans('main.feetype-info',['name'=>$feetype->name]) }}
    </x-slot>

    <x-slot name="content">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div >
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex justify-between">
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-gray-900">{{ trans('main.feetype-info',['name'=>$feetype->name]) }}</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ trans('main.feetype-info-description') }}</p>
                    </div>
                    </div>
                </div>
                <div class="border-t border-gray-200 two-columns-print">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{trans('main.feetype')}}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$feetype->name ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.name-en') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$feetype->name_en ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.description') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$feetype->description ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.created-at') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{MyCarbon::parse($feetype->created_at)->format('d-m-Y') ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.updated-at') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{MyCarbon::parse($feetype->updated_at)->format('d-m-Y') ?? trans('main.undefined')}}</dd>
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




