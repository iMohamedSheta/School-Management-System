


@extends('layouts.master')

@section('Pagetitle',"Classroom Subject")

@section('Content')


<livewire:classroom.classroom-subject.classroom-subject-table :classroom='$classroom'>


@endsection
