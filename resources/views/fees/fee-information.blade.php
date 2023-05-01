

@extends('layouts.master')

{{-- ------------------------------------------------------------------------------------------------- --}}

@section('Pagetitle',"Fee Information")

{{-- ------------------------------------------------------------------------------------------------- --}}
@section('styles')
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
            #print-icon
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
{{-- ------------------------------------------------------------------------------------------------- --}}

@section('Content')

<livewire:fees.fee-information :fee="$fee">

@endsection

{{-- ------------------------------------------------------------------------------------------------- --}}


@section('scripts')

  <script>
    window.addEventListener('print', function () {
        window.print();
    });
    </script>

@endsection
