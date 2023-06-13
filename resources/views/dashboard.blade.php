



@extends('layouts.master')

@section('styles')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />

@endsection

@section('Pagetitle',"Dashboard")



@section('Content')

@if(auth()->user()->isAdmin())

    @include('dashboard.admin')

@elseif (auth()->user()->isTeacher())

    @include('dashboard.teacher')

@elseif (auth()->user()->isStudent())

    @include('dashboard.student')

@elseif (auth()->user()->isParent())

    @include('dashboard.parent')

@else

You logged in with no role please contact your admin or your school.

@endif

@endsection
