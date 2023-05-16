


@extends('layouts.master')

@section('Pagetitle',"Create Meeting")

@section('Content')


<livewire:online-meeting.create-meeting>


@endsection

@section('scripts')
<script>

    flatpickr("#start_time", {
        enableTime:true,
        dateFormat: "Y-m-d H:i:ss",
    onChange: function(selectedDates, dateStr, instance) {
        document.getElementById("start_time").value = dateStr;
    }
    });
</script>
@endsection
