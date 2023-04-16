





@extends('layouts.master')

@section('Pagetitle',"Create Fee")

@section('Content')

<livewire:fees.create-fees>
@endsection



@section('scripts')
<script>
    let data_birth = document.getElementById('due_date');
    flatpickr("#due_date", {
      dateFormat: "Y-m-d",
      onChange: function(selectedDates, dateStr, instance) {
        data_birth.value = dateStr;
      }
    });
</script>



@endsection
