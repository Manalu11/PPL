<x-app-layout>

    <div class="py-12 max-w-5xl mx-auto">

        <h2 class="text-2xl font-semibold mb-8">Keranjang Belanjaan</h2>

        @if(session('cart') && count(session('cart')) > 0)

        <!-- LIST PRODUK -->
        @php $total = 0; @endphp

        @foreach(session('cart') as $id => $details)

        @php $total += $details['price'] * $details['quantity']; @endphp

        <div class="bg-white p-6 rounded-xl shadow mb-4 flex justify-between items-center">

            <div class="flex items-center gap-4">

                <!-- GAMBAR -->
                <img src="{{ asset('storage/' . $details['image']) }}" class="w-24 h-24 object-cover rounded-lg">

                <div>
                    <h3 class="font-semibold text-lg">
                        {{ $details['name'] }}
                    </h3>

                    <p class="text-gray-500">
                        Rp {{ number_format($details['price']) }}
                    </p>

                    <!-- QTY CONTROL -->
                    <div class="flex items-center gap-3 mt-2">

                        <!-- Minus -->
                        <form action="{{ route('cart.update', $id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="{{ $details['quantity'] - 1 }}">
                            <button class="bg-gray-200 px-3 py-1 rounded">-</button>
                        </form>

                        <span>{{ $details['quantity'] }}</span>

                        <!-- Plus -->
                        <form action="{{ route('cart.update', $id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="{{ $details['quantity'] + 1 }}">
                            <button class="bg-gray-200 px-3 py-1 rounded">+</button>
                        </form>

                        <!-- Hapus -->
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 text-sm ml-4">
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>
            </div>

            <!-- TOTAL PER PRODUK -->
            <div class="font-semibold text-pink-500">
                Rp {{ number_format($details['price'] * $details['quantity']) }}
            </div>

        </div>

        @endforeach


        <!-- TOTAL -->
        <div class="bg-white p-6 rounded-xl shadow mt-6 flex justify-between items-center">
            <h3 class="text-lg font-semibold">Total</h3>
            <span class="text-xl font-bold text-pink-500">
                Rp {{ number_format($total) }}
            </span>
        </div>

        <!-- CHECKOUT BUTTON -->
        <div class="mt-6 text-right">
            <a href="{{ route('checkout') }}"
                class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-full inline-block">
                Checkout Sekarang
            </a>

        </div>

        @else

        <!-- EMPTY STATE -->
        <div class="flex flex-col items-center justify-center py-20">

            <div class="bg-pink-100 p-10 rounded-3xl mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-pink-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 6h14" />
                </svg>
            </div>

            <p class="text-gray-600 text-center mb-6 text-lg">
                Ayok Bestiee, isi keranjang kamu sekarang dengan <br>
                produk kecantikan favoritmu!
            </p>

            <a href="/" class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-full transition">
                Belanja Sekarang
            </a>

        </div>

        @endif

    </div>

</x-app-layout>