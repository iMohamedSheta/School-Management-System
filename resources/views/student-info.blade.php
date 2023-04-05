


@extends('layouts.master')

@section('Pagetitle',"Student information")

@section('Content')

    <livewire:student-information :student="$student">


<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #print-content, #print-content * {
            visibility: visible;
        }
        #print-content {
            position: absolute;
            top: 0;
            width: 100%;
        }
        #print-btn
        {
            visibility: hidden;
        }
        .two-columns-print {
        column-count: 2;
        column-gap: 1rem;
    }
    }
    </style>


@endsection
