<nav class="bg-gray-900 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-white text-2xl font-bold hover:text-gray-300 transition ease-in-out duration-300">AgencijaStojke</a>

        <!-- Desktop Navigacija -->
        <div class="hidden md:flex space-x-6">
            @auth
                <!-- Prikaz za ulogovane korisnike -->
                <a href="{{ url('/dashboard') }}" class="text-gray-300 hover:text-white transition ease-in-out duration-300">Dashboard</a>

                @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor'))
                    <a href="{{ route('reservations.index') }}" class="text-gray-300 hover:text-white transition ease-in-out duration-300">Reservations</a>
                    <a href="{{ route('arrangements.index') }}" class="text-gray-300 hover:text-white transition ease-in-out duration-300">Arrangements</a>
                @endif

                @if (auth()->user()->hasRole('user'))
                    <a href="" class="text-gray-300 hover:text-white transition ease-in-out duration-300">Create Reservations</a>
                @endif

                <!-- Default za ostale korisnike -->
                @if (!(auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor')))
                    <a href="" class="text-gray-300 hover:text-white transition ease-in-out duration-300">Home</a>
                @endif

                <a href="{{ route('logout') }}" class="text-gray-300 hover:text-white transition ease-in-out duration-300">Log out</a>
            @else
                <!-- Prikaz za neregistrovane korisnike -->
                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition ease-in-out duration-300">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-gray-300 hover:text-white transition ease-in-out duration-300">Register</a>
                @endif
            @endauth
        </div>

        <!-- Mobile meni dugme -->
        <button class="text-gray-300 md:hidden" id="menu-toggle">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile meni -->
    <div class="md:hidden bg-gray-900 p-4 mt-4 space-y-4 hidden rounded-lg shadow-lg" id="menu">
        @auth
            <!-- Mobile meni za ulogovane korisnike -->
            <a href="{{ url('/dashboard') }}" class="text-gray-300 hover:text-white block transition ease-in-out duration-300">Dashboard</a>

            @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor'))
                <a href="{{ route('reservations.index') }}" class="text-gray-300 hover:text-white block transition ease-in-out duration-300">Reservations</a>
                <a href="{{ route('arrangements.index') }}" class="text-gray-300 hover:text-white block transition ease-in-out duration-300">Arrangements</a>
            @endif

            @if (auth()->user()->hasRole('user'))
                <a href="" class="text-gray-300 hover:text-white block transition ease-in-out duration-300">Create Reservations</a>
            @endif

            @if (!(auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor')))
                <a href="" class="text-gray-300 hover:text-white block transition ease-in-out duration-300">Home</a>
            @endif

            <a href="{{ route('logout') }}" class="text-gray-300 hover:text-white block transition ease-in-out duration-300">Log out</a>
        @else
            <!-- Mobile meni za neregistrovane korisnike -->
            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white block transition ease-in-out duration-300">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-gray-300 hover:text-white block transition ease-in-out duration-300">Register</a>
            @endif
        @endauth
    </div>
</nav>

<!-- JavaScript za otvaranje/zaključavanje mobilnog menija -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    
    menuToggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
