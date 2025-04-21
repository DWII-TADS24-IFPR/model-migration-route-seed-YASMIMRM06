<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGAC - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    @include('layouts.partials.header')
    
    <div class="flex min-h-screen">
        @include('layouts.partials.sidebar')
        
        <main class="flex-1 p-6">
            @yield('breadcrumbs')
            @yield('content')
        </main>
    </div>
    
    @include('layouts.partials.footer')
    @stack('scripts')
</body>
</html>