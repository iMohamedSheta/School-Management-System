



@extends('layouts.master')

@section('Pagetitle',"Registration")

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
            {{ str_replace('_', '-', app()->getLocale()) == "ar" ? "right":'left'}}:0;
            width: 100vw;
            height: 100vh;
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

@section('Content')

<livewire:add-user>

@endsection

@section('scripts')

{{-- Import Search Users and add user_id inside hidden input --}}
<script type="module">

    import { setupSearchParents } from "{{ asset('search.js') }}";

    // Get the input elements
    Livewire.on('parentSearched', function() {
        let searchInput = document.getElementById('search_parent');
        let userIdInput = document.getElementById('parent_id');

        // Add Search for Users Function
        setupSearchParents(searchInput, userIdInput);
    });
</script>


<script>
    window.addEventListener('print', function () {
        window.print();
    });
</script>

@endsection
