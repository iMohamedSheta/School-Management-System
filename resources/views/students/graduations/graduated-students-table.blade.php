




@extends('layouts.master')

@section('Pagetitle',"Students Graduations Table")

@section('Content')

<livewire:students.students-graduations-table>

@endsection

@section('scripts')
<script>
    flatpickr("#start_date", {
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr, instance) {
            window.livewire.emit('dateRangeUpdated', {start_date: dateStr, end_date: document.getElementById("end_date").value});
        }
    });

    flatpickr("#end_date", {
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr, instance) {
            window.livewire.emit('dateRangeUpdated', {start_date: document.getElementById("start_date").value, end_date: dateStr});
        }
    });
</script>
@endsection