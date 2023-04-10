




@extends('layouts.master')

@section('Pagetitle',"Edit Student information")

@section('Content')

<livewire:student-info-edit :student="$student">



@endsection


@section('scripts')
<script>
    let data_birth = document.getElementById('date_birth');
    flatpickr("#date_birth", {
      dateFormat: "Y-m-d",
      onChange: function(selectedDates, dateStr, instance) {
        data_birth.value = dateStr;
      }
    });
</script>



@endsection
