



<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div id="print-content">
    <div class="px-4 py-5 sm:px-6">
        <div class="flex justify-between">
        <div>
            <h3 class="text-base font-semibold leading-6 text-gray-900">{{ trans('main.student-form') }}</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ trans('main.student-form-info') }}</p>
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
          <dt class="text-sm font-medium text-gray-500">{{trans('main.studentname')}}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{ trans('main.father-name') }}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->parent->Name_Father ?? "Undefined"}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{ trans('main.mother-name') }}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->parent->Name_Mother ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{trans('main.gender')}}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->gender->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">{{ trans('main.grade') }}</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->grade->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.classroom') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->classroom->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.date-birth') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->date_birth ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.nationality') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->nationality->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.academic-year') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->academic_year ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.blood-type') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->blood_type->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.religion') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->religion->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.student-email') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->user->email ?? "Undefined"}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.created_at') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->created_at ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">{{ trans('main.phone-father') }}</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->parent->Phone_Father ?? "Undefined"}}</dd>
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
