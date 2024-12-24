<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This website is about manage events.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Event Metro') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/drop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    @livewireStyles
    @stack('style')
</head>

@include('layouts.partials.sidebar')

<main class="w-full bg-body md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
    @include('layouts.partials.navbar')
    <div class="m-6 min-h-[86vh] bg-white">
        {{ $slot }}
    </div>
</main>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/ckeditor.js') }}"></script>
<script src="{{ asset('assets/js/drop.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/nice-select2.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    var options = {
        searchable: true,
        placeholder: 'select',
        searchtext: 'zoek',
        selectedtext: 'item selected'
    };
    var instance = NiceSelect.bind(document.getElementById("seachable-select"), options);
</script>
@livewireScripts
@stack('script')

</body>

</html>