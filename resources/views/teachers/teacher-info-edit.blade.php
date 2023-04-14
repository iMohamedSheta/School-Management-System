




@extends('layouts.master')

@section('Pagetitle',"Teacher Edit information")

@section('Content')

<livewire:teachers.teacher-info-edit :teacher="$teacher">

@endsection


@section('scripts')
<script>
    flatpickr("#joining_date", {
      dateFormat: "Y-m-d",
      onChange: function(selectedDates, dateStr, instance) {
        document.getElementById("joining_date").value = dateStr;
      }
    });
</script>
@endsection
