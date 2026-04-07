<x-app-layout>
    <div class="max-w-4xl mx-auto py-12">

        <h2 class="text-2xl font-bold mb-6">Halaman Checkout</h2>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-2">Nama Lengkap</label>
                <input type="text" name="name" required class="w-full border rounded px-4 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-2">Alamat</label>
                <textarea name="address" required class="w-full border rounded px-4 py-2"></textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-2">No HP</label>
                <input type="text" name="phone" required class="w-full border rounded px-4 py-2">
            </div>

            <button class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded">
                Proses Checkout
            </button>

        </form>

    </div>
</x-app-layout>