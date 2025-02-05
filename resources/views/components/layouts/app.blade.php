<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'JerseyKu' }}</title>

        <link href="{{asset('css/custom.css')}}" rel="stylesheet">
        <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        @livewireStyles
    </head>
    <body>
        @livewireScripts
        <div id="app">
        <livewire:navbar/>
        <main>
        {{ $slot }}
        </main>
        </div>
        
    </body>
        @livewire('footer')
</html>
