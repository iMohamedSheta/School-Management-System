






@extends('layouts.master')

@section('Pagetitle',"Attendances Classroom")

@section('Content')

<livewire:attendances.attendance-classroom-table :students="$students" :classroom="$classroom">

@endsection
