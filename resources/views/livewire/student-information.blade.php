



<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div id="print-content">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-base font-semibold leading-6 text-gray-900">استمارة الطالب</h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">المعلومات الشخصية ومعلومات البريد الالكتروني علي النظام</p>
      <button id="print-btn" wire:click="print">Print</button>
    </div>
    <div class="border-t border-gray-200 two-columns-print">
      <dl>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">الاسم</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">اسم الاب</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->parent->Name_Father ?? "Undefined"}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">اسم الام</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->parent->Name_Mother ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">النوع</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->gender->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">المرحلة الدراسية</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->grade->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">الفصل الدراسي</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->classroom->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">تاريخ الميلاد</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->date_birth ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">الجنسية</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->nationality->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">السنة الدراسية</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->academic_year ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">فصيلة الدم</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->blood_type->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">الديانة</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->religion->name ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">البريد الالكتروني</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->user->email ?? "Undefined"}}</dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">تاريخ التسجيل</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$student->created_at ?? "Undefined"}}</dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">رقم هاتف الاب</dt>
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
