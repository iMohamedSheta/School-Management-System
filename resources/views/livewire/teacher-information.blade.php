



<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div id="print-content">
    <div class="px-4 py-5 sm:px-6">
        <div class="flex justify-between">
        <div>
            <h3 class="text-base font-semibold leading-6 text-gray-900">{{ trans('main.teacher-form') }}</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ trans('main.teacher-form-info',['name'=>$teacher->teacher_name]) }}</p>
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
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{trans('main.name')}}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$teacher->teacher_name ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{ trans('main.national-id') }}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$teacher->national_id_teacher ?? trans('main.undefined') }}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{ trans('main.passport-id') }}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$teacher->passport_id_teacher ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{trans('main.gender')}}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$teacher->gender->name ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{ trans('main.specialization') }}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$teacher->specialization->name ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.address') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$teacher->address ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.joining-date') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$teacher->joining_date ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.nationality') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$teacher->nationality->name ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.email') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$teacher->user->email ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.blood-type') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$teacher->blood_type->name ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.religion') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$teacher->religion->name ?? trans('main.undefined')}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.phone') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$teacher->phone_teacher ?? trans('main.undefined')}}</dd>
        </div>


      </dl>
    </div>
    </div>
  </div>


  <script>
    window.addEventListener('print', function () {
        window.print();
    });
    </script>
