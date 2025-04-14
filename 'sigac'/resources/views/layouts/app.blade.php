<!DOCTYPE html>
<html lang="pt-BR">
<head>
    @include('layouts.partials.head')
</head>
<body>
    @include('layouts.partials.nav')

    <main class="container py-4">
        @yield('content')
    </main>

    @include('layouts.partials.scripts')
    @stack('scripts') <!-- Para scripts específicos de páginas -->
</body>
</html>