


<div class="inline-flex"  >
    <button wire:click='openModalToDelete' class="mx-2"><i class="fa-solid fa-trash text-red-600 hover:text-red-500 fa-lg"></i></button>

    <x-confirmation-modal wire:model="openModal" >
        <x-slot name="title">
            {{ trans('main.delete_academic_year') }}
        </x-slot>

        <x-slot name="content">
            {{trans('main.delete_academic_year_title',['name'=>$academic_year->name ?? trans('main.undefined')])}}
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

