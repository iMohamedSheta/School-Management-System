
<div class="inline-flex "  >
    <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 " wire:click='openModalToDelete' >
        <i class="mx-2 fa-solid fa-trash text-red-600 hover:text-red-500 fa-lg "></i>
        {{ trans('main.delete-online-class') }}
    </button>


        <!-- Delete modal -->


    <x-confirmation-modal wire:model="openModal"  >
        <x-slot name="title">
        {{ trans('main.delete-online-class') }}
        </x-slot>

        <x-slot name="content">
        {{trans('main.delete-online-class-title',['name'=>$meeting->topic ?? trans('main.undefined')])}}
        </x-slot>

        <x-slot name="footer">
            <x-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ trans('main.delete') }}
            </x-danger-button>
            <x-secondary-button wire:click="$toggle('openModal')" wire:loading.attr="disabled">
                {{ trans('main.cancel') }}
            </x-secondary-button>

        </x-slot>


    </x-confirmation-modal>
    </div>
