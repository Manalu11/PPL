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
                        <span class="mt-3 text-gray-700 text-sm">Category</span>
                    </div>
                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute top-24 w-48 bg-white rounded-xl shadow-lg p-4 z-50">
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li><a href="{{ url('/category/toner') }}" class="hover:text-pink-500">Toner</a></li>
                            <li><a href="{{ url('/category/moisturizer') }}" class="hover:text-pink-500">Moisturizer</a>
                            </li>
                            <li><a href="{{ url('/category/serum') }}" class="hover:text-pink-500">Serum</a></li>
                        </ul>
                    </div>
                </div>

                {{-- SKIN CONCERN --}}
                <div x-data="{ openSkin: false }" class="relative flex flex-col items-center">
                    <div @click="openSkin = !openSkin" class="flex flex-col items-center group cursor-pointer">
                        <div class="w-16 h-16 bg-pink-200 rounded-full flex items-center justify-center text-2xl
                            group-hover:bg-pink-400 group-hover:text-white transition">
                            🧴
                        </div>
                        <span class="mt-3 text-gray-700 text-sm">Skin Concern</span>
                    </div>
                    <div x-show="openSkin" @click.away="openSkin = false" x-transition
                        class="absolute top-24 w-48 bg-white rounded-xl shadow-lg p-4 z-50">
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li><a href="{{ url('/skin/normal') }}" class="hover:text-pink-500">Normal</a></li>
                            <li><a href="{{ url('/skin/oily') }}" class="hover:text-pink-500">Oily</a></li>
                            <li><a href="{{ url('/skin/very_dry') }}" class="hover:text-pink-500">Dry</a></li>
                        </ul>
                    </div>
                </div>

                {{-- PROMOTION --}}
                <a href="{{ route('promotion') }}" class="flex flex-col items-center group cursor-pointer">
                    <div class="w-16 h-16 bg-pink-200 rounded-full flex items-center justify-center text-2xl
                        group-hover:bg-pink-400 group-hover:text-white transition">
                        💲
                    </div>
                    <span class="mt-3 text-gray-700 text-sm">Promotion</span>
                </a>

                {{-- NEW ARRIVALS --}}
                <a href="{{ route('new.arrivals') }}" class="flex flex-col items-center group cursor-pointer">
                    <div class="w-16 h-16 bg-pink-200 rounded-full flex items-center justify-center text-2xl
                        group-hover:bg-pink-400 group-hover:text-white transition">
                        🆕
                    </div>
                    <span class="mt-3 text-gray-700 text-sm">New Arrivals</span>
                </a>

                {{-- BEST SELLER (ACTIVE) --}}
                <a href="{{ route('best.seller') }}" class="flex flex-col items-center group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-pink-400 rounded-full flex items-center justify-center text-2xl text-white shadow-md">
                        🏆
                    </div>
                    <span class="mt-3 text-pink-500 text-sm font-semibold">Best Seller</span>
                </a>

            </div>

            <!-- SECTION TITLE -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">🏆 Best Seller</h2>
                    <p class="text-sm text-gray-400 mt-1">Produk yang paling banyak dibeli pelanggan</p>
                </div>
                <a href="{{ route('dashboard') }}" class="text-pink-500 text-sm hover:underline">
                    ← Kembali ke Beranda
                </a>
            </div>

            <!-- PRODUCT GRID -->
            @if($products->isEmpty())
            <div class="flex flex-col items-center justify-center py-24 text-gray-400">
                <span class="text-6xl mb-4">🏆</span>
                <p class="text-lg font-medium">Belum ada data penjualan.</p>
                <p class="text-sm mt-1">Produk terlaris akan muncul di sini.</p>
                <a href="{{ route('dashboard') }}"
                    class="mt-6 bg-pink-400 hover:bg-pink-500 text-white text-sm px-6 py-2 rounded-full transition">
                    Lihat Semua Produk
                </a>
            </div>
            @else
            <div class="overflow-x-auto pb-4">
                <div class="grid gap-6" style="grid-template-columns: repeat(6, minmax(260px, 260px));">

                    @foreach($products as $index => $product)
                    <a href="{{ route('product.show', $product->id) }}" class="block">
                        <div
                            class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 relative cursor-pointer h-full flex flex-col">

                            {{-- Badge Ranking --}}
                            @if($index === 0)
                            <span class="absolute top-3 left-3 bg-yellow-400 text-white text-xs px-3 py-1 font-bold">
                                🥇 #1
                            </span>
                            @elseif($index === 1)
                            <span class="absolute top-3 left-3 bg-gray-400 text-white text-xs px-3 py-1 font-bold">
                                🥈 #2
                            </span>
                            @elseif($index === 2)
                            <span class="absolute top-3 left-3 bg-amber-600 text-white text-xs px-3 py-1 font-bold">
                                🥉 #3
                            </span>
                            @else
                            <span class="absolute top-3 left-3 bg-pink-300 text-white text-xs px-3 py-1">
                                #{{ $index + 1 }}
                            </span>
                            @endif

                            {{-- Badge Discount --}}
                            @if($product->discount)
                            <span class="absolute top-3 right-3 bg-red-500 text-white text-xs px-3 py-1">
                                {{ $product->discount }}%
                            </span>
                            @endif

                            {{-- IMAGE --}}
                            <div class="bg-gray-50 rounded-lg p-4 mb-3 flex items-center justify-center">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="h-24 object-contain">
                            </div>

                            {{-- Weight --}}
                            <div class="text-xs text-gray-500 mb-2 text-center">30g</div>

                            {{-- Brand --}}
                            <h3 class="font-semibold text-gray-800 uppercase text-sm text-center">
                                {{ $product->brand }}
                            </h3>

                            {{-- Product Name --}}
                            <p class="text-gray-500 text-xs mt-1 text-center flex-1">
                                {{ $product->name }}
                            </p>

                            {{-- Total Terjual --}}
                            <div class="text-pink-400 text-xs mt-1 text-center font-medium">
                                🛍️ {{ $product->order_items_sum_quantity ?? 0 }} terjual
                            </div>

                            {{-- Price --}}
                            <div class="mt-2">
                                @if($product->discount)
                                <p class="text-gray-400 line-through text-sm text-center">
                                    Rp {{ number_format($product->price) }}
                                </p>
                                <p class="text-pink-500 font-bold text-center">
                                    Rp
                                    {{ number_format($product->price - ($product->price * $product->discount / 100)) }}
                                </p>
                                @else
                                <p class="text-pink-500 font-bold text-center">
                                    Rp {{ number_format($product->price) }}
                                </p>
                                @endif
                            </div>

                            {{-- Reviews --}}
                            <div class="text-pink-400 text-xs mt-1 text-center">
                                ★ ({{ $product->reviews->count() }} reviews)
                            </div>

                            {{-- Button --}}
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-3">
                                @csrf
                                <button
                                    class="w-full bg-pink-400 hover:bg-pink-500 text-white text-sm py-2 rounded-full transition">
                                    🛒 Masukkan Keranjang
                                </button>
                            </form>

                        </div>
                    </a>
                    @endforeach

                </div>
            </div>

            <div class="mt-8 text-center text-gray-400 text-sm">
                Menampilkan {{ $products->count() }} produk terlaris
            </div>

            @endif

        </div>

    </div>

</x-app-layout>