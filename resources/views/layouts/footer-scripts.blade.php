

<!-- main script file  -->
<script src='{{asset("assets/js/soft-ui-dashboard-tailwind.js?v=1.0.4")}}' async></script>
{{-- Search Script Ajax  --}}
<script src='{{asset("search.js")}}' type="module" async></script>
{{-- Livewire Scripts --}}
@livewireScripts()
{{-- Powergrid Livewire Datatable Scripts --}}
@powerGridScripts()




{{-- <link rel="stylesheet" href="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.css" /> --}}
<script src="https://unpkg.com/simplebar@5.3.0/dist/simplebar.min.js"></script>



<script>
    const simplebarElements = document.querySelectorAll('.simplebar');
    simplebarElements.forEach(el => new SimpleBar(el));
</script>





@yield('scripts')
