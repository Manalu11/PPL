<x-app-layout>

    <div class="bg-gray-100 min-h-screen">

        <!-- HERO -->
        <div class="bg-gradient-to-r from-pink-300 to-pink-500 py-8 text-center text-white">
            <h1 class="text-3xl font-bold tracking-wide">
                WELCOME TO GLOWTOSKIN GIRLS !
            </h1>
            <p class="mt-2 text-lg">
                Discover Your Beauty ✨
            </p>
        </div>

        <div class="px-8 py-12">
            <!-- CATEGORY MENU -->
            <div class="flex justify-center gap-14 mb-14 flex-wrap">

                {{-- CATEGORY (DROPDOWN) --}}
                <div x-data="{ open: false }" class="relative flex flex-col items-center">

                    <div @click="open = !open" class="flex flex-col items-center group cursor-pointer">

                        <div class="w-16 h-16 bg-pink-200 rounded-full flex items-center justify-center text-2xl
                group-hover:bg-pink-400 group-hover:text-white transition">
                            💖
                        </div>

                        <span class="mt-3 text-gray-700 text-sm">
                            Category
                        </span>
                    </div>

                    {{-- DROPDOWN CONTENT --}}
                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute top-24 w-48 bg-white rounded-xl shadow-lg p-4 z-50">

                        <li>
                            <a href="{{ url('/category/toner') }}" class="hover:text-pink-500">
                                Toner
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/category/moisturizer') }}" class="hover:text-pink-500">
                                Moisturizer
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/category/serum') }}" class="hover:text-pink-500">
                                Serum
                            </a>
                        </li>


                    </div>
                </div>

                {{-- SKIN CONCERN --}}
                <div x-data="{ openSkin: false }" class="relative flex flex-col items-center">

                    <div @click="openSkin = !openSkin" class="flex flex-col items-center group cursor-pointer">

                        <div class="w-16 h-16 bg-pink-200 rounded-full flex items-center justify-center text-2xl
            group-hover:bg-pink-400 group-hover:text-white transition">
                            🧴
                        </div>

                        <span class="mt-3 text-gray-700 text-sm">
                            Skin Concern
                        </span>
                    </div>

                    {{-- DROPDOWN --}}
                    <div x-show="openSkin" @click.away="openSkin = false" x-transition
                        class="absolute top-24 w-48 bg-white rounded-xl shadow-lg p-4 z-50">

                        <ul class="space-y-3 text-sm text-gray-600">
                            <li>
                                <a href="{{ url('/skin/normal') }}" class="hover:text-pink-500">
                                    Normal
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/skin/oily') }}" class="hover:text-pink-500">
                                    Oily
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/skin/very_dry') }}" class="hover:text-pink-500">
                                    Very Dry
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>

                {{-- PROMOTION --}}
                <div class="flex flex-col items-center group cursor-pointer">
                    <div class="w-16 h-16 bg-pink-200 rounded-full flex items-center justify-center text-2xl
            group-hover:bg-pink-400 group-hover:text-white transition">
                        💲
                    </div>
                    <span class="mt-3 text-gray-700 text-sm">
                        Promotion
                    </span>
                </div>

                {{-- NEW ARRIVALS --}}
                <div class="flex flex-col items-center group cursor-pointer">
                    <div class="w-16 h-16 bg-pink-200 rounded-full flex items-center justify-center text-2xl
            group-hover:bg-pink-400 group-hover:text-white transition">
                        🆕
                    </div>
                    <span class="mt-3 text-gray-700 text-sm">
                        New Arrivals
                    </span>
                </div>

                {{-- BEST SELLER --}}
                <div class="flex flex-col items-center group cursor-pointer">
                    <div class="w-16 h-16 bg-pink-200 rounded-full flex items-center justify-center text-2xl
            group-hover:bg-pink-400 group-hover:text-white transition">
                        🏆
                    </div>
                    <span class="mt-3 text-gray-700 text-sm">
                        Best Seller
                    </span>
                </div>

            </div>


            <!-- SECTION TITLE -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">
                    New Arrivals
                </h2>
                <a href="#" class="text-pink-500 text-sm hover:underline">
                    Lihat Semua
                </a>
            </div>

            <!-- PRODUCT HORIZONTAL SCROLL -->
            <div class="flex gap-6 overflow-x-auto pb-4 scroll-smooth">

                @forelse($products as $product)

                <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 min-w-[260px] relative">

                    {{-- Badge NEW --}}
                    @if($product->is_new)
                    <span class="absolute top-3 left-3 bg-black text-white text-xs px-3 py-1">
                        NEW
                    </span>
                    @endif

                    {{-- Badge Discount --}}
                    @if($product->discount)
                    <span class="absolute top-3 right-3 bg-red-500 text-white text-xs px-3 py-1">
                        {{ $product->discount }}%
                    </span>
                    @endif

                    {{-- Love Icon --}}
                    <div class="absolute top-3 right-3 text-gray-300 text-xl cursor-pointer">
                        ❤
                    </div>

                    {{-- IMAGE --}}
                    <div class="bg-gray-50 rounded-lg p-4 mb-3 flex items-center justify-center">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"
                            class="h-24 object-contain">
                    </div>

                    {{-- Weight --}}
                    <div class="text-xs text-gray-500 mb-2 text-center">
                        30g
                    </div>

                    {{-- Button --}}
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button
                            class="w-full bg-pink-400 hover:bg-pink-500 text-white text-sm py-2 rounded-full transition mb-3">
                            🛒 Masukkan Keranjang
                        </button>
                    </form>


                    {{-- Brand --}}
                    <h3 class="font-semibold text-gray-800 uppercase text-sm text-center">
                        {{ $product->brand }}
                    </h3>

                    {{-- Product Name --}}
                    <p class="text-gray-500 text-xs mt-1 text-center">
                        {{ $product->name }}
                    </p>

                    {{-- Price --}}
                    <p class="text-pink-500 font-bold mt-2 text-center">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>

                    {{-- Reviews --}}
                    <div class="text-pink-400 text-xs mt-1 text-center">
                        ★ (2 reviews)
                    </div>

                </div>

                @empty
                <div class="text-center text-gray-500">
                    Belum ada produk tersedia.
                </div>
                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>