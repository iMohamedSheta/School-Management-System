




@extends('layouts.master')

@section('Pagetitle',"Edit Study Fee")

@section('Content')


<livewire:fees.fee-info-edit :fee='$fee'>

@endsection


@section('scripts')
<script>

        flatpickr("#due_date", {
    dateFormat: "Y-m-d",
    onChange: function(selectedDates, dateStr, instance) {
    document.getElementById("due_date").value = dateStr;
    }
    });
</script>



@endsection
