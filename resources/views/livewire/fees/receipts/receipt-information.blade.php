





<div class="inline-flex">
    <button wire:click ="openModalToShowInfo"   class="mx-2">
        <i class="fa-solid fa-file-lines fa-lg hover:text-gray-800"></i>
    </button>


<!-- Show Info modal -->
<x-dialog-modal wire:model="openModal"  >
    <x-slot name="title">
        {{ trans('main.receipt-info',['name'=>$receipt->student->name]) }}
    </x-slot>

    <x-slot name="content">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div >
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex justify-between">
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-gray-900">{{ trans('main.receipt-info',['name'=>$receipt->student->name]) }}</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ trans('main.receipt-info-description',['name'=>$receipt->student->name]) }}</p>
                    </div>
                    </div>
                </div>
                <div class="border-t border-gray-200 two-columns-print">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{trans('main.title')}}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$receipt->title ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.amount-of-money') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 font-mono font-bold">{{ $receipt->formatted_amount ??  trans('main.undefined') ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.description') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$receipt->description ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.created-at') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{MyCarbon::parse($receipt->date)->format('d-m-Y') ?? trans('main.undefined')}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">{{ trans('main.updated-at') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{MyCarbon::parse($receipt->updated_at)->format('d-m-Y') ?? trans('main.undefined')}}</dd>
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




