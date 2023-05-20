



@extends('layouts.master')

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
