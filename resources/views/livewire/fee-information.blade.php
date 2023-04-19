



<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div id="print-content">
    <div class="px-4 py-5 sm:px-6">
        <div class="flex justify-between">
        <div>
            <h3 class="text-base font-semibold leading-6 text-gray-900">{{ trans('main.fee-info',['name'=>$fee->classroom->name]) }}</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ trans('main.fee-info-description') }}</p>
        </div>
      <div  class="flex items-center mx-8">
        <button id="print-btn" wire:click="print">
            <i id="print-icon" class="fa-solid fa-print fa-xl px-1"></i> {{trans('main.print')}}
        </button>
      </div>
        </div>
    </div>
    <div class="border-t border-gray-200 two-columns-print">
      <dl>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{trans('main.title')}}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$fee->title ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{ trans('main.feetype') }}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$fee->feetype->name ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{ trans('main.grade') }}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$fee->grade->name ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{ trans('main.classroom') }}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$fee->classroom->name ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{trans('main.amount')}}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 font-mono font-bold">{{$fee->formatted_amount ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.currency') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$fee->currency->name ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{ trans('main.created-at') }}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{MyCarbon::parse($fee->created_at)->format('d-m-Y') ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.due_date') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{MyCarbon::parse($fee->due_date)->format('d-m-Y') ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.academic-year') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$fee->year ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.description') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$fee->description ?? trans('main.undefined')}}</dd>
        </div>

      </dl>
    </div>
    </div>
  </div>

