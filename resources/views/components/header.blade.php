<!-- TOP BAR -->
@guest
<div class="w-full bg-gradient-to-r from-pink-300 to-pink-500 text-white text-sm py-2 text-center tracking-wide">
    Login terlebih dahulu sebelum ingin berbelanja / Cek Permasalahan terlebih dahulu !
</div>
@endguest


<!-- MAIN HEADER -->
<header class="w-full bg-white shadow-md px-8 py-4 flex items-center justify-between">

    <!-- LEFT -->
    <!-- LEFT -->
    <div class="flex items-center space-x-5">

        <!-- Logo -->
        <img src="/images/gift.png" class="w-10 h-10 object-cover rounded-full">

        <!-- Brand -->
        <h1 class="text-2xl font-semibold tracking-wide text-gray-800">
            GlowToSkin
        </h1>

        <!-- Hamburger -->
        <div class="relative group">

            <button class="text-gray-700 hover:text-pink-500 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Dropdown -->
            <div class="absolute left-0 top-full w-56 bg-white shadow-xl rounded-xl py-3
    opacity-0 invisible group-hover:opacity-100 group-hover:visible
    transition duration-200 z-50">


                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 hover:bg-pink-50">
                    🏠 Home
                </a>


                <a href="#" class="flex items-center px-4 py-2 hover:bg-pink-50">
                    📝 Pesanan
                </a>

                <a href="#" class="flex items-center px-4 py-2 hover:bg-pink-50">
                    💳 Metode Pembayaran
                </a>

                <a href="#" class="flex items-center px-4 py-2 hover:bg-pink-50">
                    ⭐ Ulasan
                </a>

                <a href="#" class="flex items-center px-4 py-2 hover:bg-pink-50">
                    👤 Profil
                </a>

                <a href="#" class="flex items-center px-4 py-2 hover:bg-pink-50">
                    ❤️ Wishlist
                </a>

            </div>
        </div>

    </div>



    <!-- CENTER -->
    <div class="w-1/3">
        <form action="{{ route('dashboard') }}" method="GET">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                class="w-full bg-pink-200 rounded-full px-6 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
        </form>
    </div>


    <!-- RIGHT -->
    <div class="flex items-center space-x-6">

        <!-- Cart -->
        <a href="{{ route('cart.index') }}" class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700 hover:text-pink-500 transition"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 6h14M9 19a1 1 0 100 2 1 1 0 000-2zm10 0a1 1 0 100 2 1 1 0 000-2z" />
            </svg>

            @if(session('cart') && count(session('cart')) > 0)
            <span class="absolute -top-2 -right-2 bg-pink-500 text-white text-xs px-2 py-0.5 rounded-full">
                {{ count(session('cart')) }}
            </span>
            @endif
        </a>


        @guest
        <a href="{{ route('login') }}" class="text-sm text-gray-700">
            LOG IN /
            <span class="text-pink-500 font-semibold">REGISTER</span>
        </a>
        @endguest


        @auth
        <div class="flex items-center space-x-3">

            <span class="text-sm text-gray-800 font-semibold">
                {{ Auth::user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-pink-500 hover:underline">
                    Logout
                </button>
            </form>

        </div>
        @endauth

    </div>

</header>