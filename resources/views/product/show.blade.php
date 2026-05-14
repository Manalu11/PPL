<x-app-layout>
    <div class="p-8">

        <div class="bg-white rounded-xl shadow p-6 flex gap-8">

            <!-- IMAGE -->
            <div class="w-1/3">
                <img src="{{ asset('storage/'.$product->image) }}"
                    class="w-full rounded-lg">
            </div>

            <!-- DETAIL -->
            <div class="w-2/3">
                <h1 class="text-2xl font-bold mb-2">
                    {{ $product->name }}
                </h1>

                <p class="text-gray-500 mb-2">
                    {{ $product->brand }}
                </p>

                <p class="text-pink-500 text-xl font-bold mb-4">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                <!-- DESKRIPSI -->
                <div class="text-gray-700 mb-6">
                    {{ $product->description ?? 'Tidak ada deskripsi' }}
                </div>

                <!-- BUTTON -->
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button class="bg-pink-500 text-white px-6 py-2 rounded-full">
                        🛒 Masukkan Keranjang
                    </button>
                </form>

                <!-- REVIEW SECTION -->
                <h2 class="text-lg font-semibold mt-8 mb-4">Review</h2>

                @forelse($product->reviews as $review)
                    <div class="border-b py-3">
                        <p class="font-semibold">{{ $review->user->name }}</p>

                        <p class="text-yellow-400">
                            {{ str_repeat('★', $review->rating) }}
                        </p>

                        <p class="text-gray-600 text-sm">
                            {{ $review->comment }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada review</p>
                @endforelse

                <!-- ✅ FORM REVIEW -->
                @auth
                <form action="{{ route('reviews.store') }}" method="POST" class="mt-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <!-- Rating -->
                    <label>Rating:</label>
                    <select name="rating" class="border rounded px-2 py-1">
                        <option value="5">⭐⭐⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="1">⭐</option>
                    </select>

                    <!-- Comment -->
                    <textarea name="comment" class="w-full border rounded mt-2 p-2"
                        placeholder="Tulis review..."></textarea>

                    <button class="bg-pink-500 text-white px-4 py-2 rounded mt-2">
                        Kirim Review
                    </button>
                </form>
                @endauth

            </div>

        </div>

    </div>
</x-app-layout>