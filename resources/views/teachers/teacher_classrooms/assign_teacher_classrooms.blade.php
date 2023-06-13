



@extends('layouts.master')

@section('Pagetitle',"Assign Teacher Classrooms")

@section('Content')


<livewire:teachers.teacher-classrooms.assign-teacher-classrooms :teacher="$teacher" />


@endsection
