<x-app-layout>
    <div class="bg-gray-100 min-h-screen">

        @if(isset($banners) && $banners->count())
        <div class="relative w-full" style="height: 180px; overflow: hidden;">
            <div id="slides" style="display:flex; transition: transform 0.7s ease;">
                @foreach($banners as $banner)
                <div style="min-width:100%;">
                    <img src="{{ asset('storage/' . $banner->image) }}"
                        style="width:100%; height:180px; object-fit:cover; object-position:center;">
                </div>
                @endforeach
            </div>
            <button onclick="prevSlide()"
                style="position:absolute; top:50%; left:12px; transform:translateY(-50%); background:rgba(255,255,255,0.75); border:none; border-radius:50%; width:38px; height:38px; font-size:20px; cursor:pointer;">&#8249;</button>
            <button onclick="nextSlide()"
                style="position:absolute; top:50%; right:12px; transform:translateY(-50%); background:rgba(255,255,255,0.75); border:none; border-radius:50%; width:38px; height:38px; font-size:20px; cursor:pointer;">&#8250;</button>
            <div
                style="position:absolute; bottom:12px; left:0; right:0; display:flex; justify-content:center; gap:8px;">
                @foreach($banners as $i => $banner)
                <button onclick="goToSlide({{ $i }})" id="dot-{{ $i }}"
                    style="width:10px; height:10px; border-radius:50%; border:none; padding:0; background:{{ $i === 0 ? '#ffffff' : 'rgba(255,255,255,0.45)' }}; cursor:pointer;"></button>
                @endforeach
            </div>
        </div>
        @else
        <div class="bg-gradient-to-r from-pink-300 to-pink-500 py-8 text-center text-white">
            <h1 class="text-3xl font-bold tracking-wide">🎉 Promo Spesial</h1>
            <p class="mt-2 text-lg">Dapatkan penawaran terbaik hari ini!</p>
        </div>
        @endif

        {{-- CATEGORY MENU --}}
        <div class="px-8 pt-8">
            <div class="flex justify-center gap-14 mb-8 flex-wrap">

                <div x-data="{ open: false }" class="relative flex flex-col items-center">
                    <div @click="open = !open" class="flex flex-col items-center group cursor-pointer">
                        <div
                            class="w-16 h-16 bg-pink-200 rounded-full flex items-center justify-center text-2xl group-hover:bg-pink-400 group-hover:text-white transition">
                            💖</div>
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

                <div x-data="{ openSkin: false }" class="relative flex flex-col items-center">
                    <div @click="openSkin = !openSkin" class="flex flex-col items-center group cursor-pointer">
                        <div
                            class="w-16 h-16 bg-pink-200 rounded-full flex items-center justify-center text-2xl group-hover:bg-pink-400 group-hover:text-white transition">
                            🧴</div>
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

                <a href="{{ route('promotion') }}" class="flex flex-col items-center group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-pink-400 rounded-full flex items-center justify-center text-2xl text-white shadow-md">
                        💲</div>
                    <span class="mt-3 text-pink-500 text-sm font-semibold">Promotion</span>
                </a>

                <a href="{{ route('new.arrivals') }}" class="flex flex-col items-center group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-pink-200 rounded-full flex items-center justify-center text-2xl group-hover:bg-pink-400 group-hover:text-white transition">
                        🆕</div>
                    <span class="mt-3 text-gray-700 text-sm">New Arrivals</span>
                </a>

                <a href="{{ route('best.seller') }}" class="flex flex-col items-center group cursor-pointer">
                    <div
                        class="w-16 h-16 bg-pink-200 rounded-full flex items-center justify-center text-2xl group-hover:bg-pink-400 group-hover:text-white transition">
                        🏆</div>
                    <span class="mt-3 text-gray-700 text-sm">Best Seller</span>
                </a>

            </div>

            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">🎉 Promo Spesial</h2>
                    <p class="text-sm text-gray-400 mt-1">Penawaran terbaik untuk kamu</p>
                </div>
                <a href="{{ route('dashboard') }}" class="text-pink-500 text-sm hover:underline">← Kembali ke
                    Beranda</a>
            </div>
        </div>

        {{-- GRID PRODUK --}}
        <div class="px-8 pb-12">
            <div class="grid gap-6" style="grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));">

                @forelse($products as $product)
                <a href="{{ route('product.show', $product->id) }}" class="block">
                    <div
                        class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 relative flex flex-col h-full">

                        @if($product->active_discount)
                        <span class="absolute top-3 right-3 bg-red-500 text-white text-xs px-3 py-1 rounded">
                            {{ $product->active_discount }}%
                        </span>
                        @endif

                        <div class="bg-gray-50 rounded-lg p-4 mb-3 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="h-24 object-contain">
                        </div>

                        <h3 class="font-semibold text-gray-800 uppercase text-sm text-center">{{ $product->brand }}</h3>
                        <p class="text-gray-500 text-xs mt-1 text-center flex-1">{{ $product->name }}</p>

                        <div class="mt-2">
                            @if($product->active_discount)
                            <p class="text-gray-400 line-through text-sm text-center">Rp
                                {{ number_format($product->price) }}
                            </p>
                            <p class="text-pink-500 font-bold text-center">Rp {{ number_format($product->final_price) }}
                            </p>
                            @else
                            <p class="text-pink-500 font-bold text-center">Rp {{ number_format($product->price) }}</p>
                            @endif
                        </div>

                        <div class="text-pink-400 text-xs mt-1 text-center">★ ({{ $product->reviews->count() }} reviews)
                        </div>

                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-3">
                            @csrf
                            <button
                                class="w-full bg-pink-400 hover:bg-pink-500 text-white text-sm py-2 rounded-full transition">
                                🛒 Masukkan Keranjang
                            </button>
                        </form>

                    </div>
                </a>
                @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    Belum ada promo aktif saat ini.
                </div>
                @endforelse

            </div>
        </div>

    </div>

    @if(isset($banners) && $banners->count())
    @php $bannerCount = $banners->count(); @endphp
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var current = 0;
            var total = <?php echo $bannerCount; ?>;
            var slidesEl = document.getElementById('slides');

            window.goToSlide = function(n) {
                current = n;
                slidesEl.style.transform = 'translateX(-' + (current * 100) + '%)';
                document.querySelectorAll('[id^="dot-"]').forEach(function(dot, i) {
                    dot.style.background = i === current ? '#ffffff' : 'rgba(255,255,255,0.45)';
                });
            };

            window.nextSlide = function() {
                window.goToSlide((current + 1) % total);
            };
            window.prevSlide = function() {
                window.goToSlide((current - 1 + total) % total);
            };

            setInterval(window.nextSlide, 4000);
        });
    </script>
    @endif

</x-app-layout>