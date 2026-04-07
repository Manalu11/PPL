<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-6">

        <div class="bg-white rounded-xl shadow p-8">

            <div class="grid md:grid-cols-2 gap-10">

                <!-- Image -->
                <div>
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full rounded-lg">
                </div>

                <!-- Detail -->
                <div>
                    <h2 class="text-3xl font-bold mb-4">
                        {{ $product->brand }}
                    </h2>

                    <p class="text-gray-600 mb-4">
                        {{ $product->name }}
                    </p>

                    <p class="text-pink-500 text-2xl font-bold mb-6">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button class="bg-pink-400 hover:bg-pink-500 text-white px-6 py-3 rounded-full">
                            🛒 Masukkan Keranjang
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>
</x-app-layout>