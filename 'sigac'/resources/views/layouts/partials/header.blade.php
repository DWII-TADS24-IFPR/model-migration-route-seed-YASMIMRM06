<header class="bg-blue-600 text-white shadow-md">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <h1 class="text-xl font-bold">
            <a href="{{ route('dashboard') }}">SIGAC</a>
        </h1>
        <nav class="flex items-center space-x-4">
            @auth
                <span class="text-sm">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm hover:underline">Sair</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm hover:underline">Login</a>
                <a href="{{ route('register') }}" class="text-sm hover:underline">Registrar</a>
            @endauth
        </nav>
    </div>
</header>