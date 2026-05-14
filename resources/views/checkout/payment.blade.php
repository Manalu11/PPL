<x-app-layout>
    <div class="max-w-2xl mx-auto py-12">

        <h2 class="text-2xl font-bold mb-6">Pilih Metode Pembayaran</h2>

        {{-- Detail Order --}}
        <div class="bg-gray-50 rounded-lg p-4 mb-6">
            <h3 class="font-semibold mb-3">Detail Pesanan #{{ $order->id }}</h3>
            @foreach ($order->orderItems as $item)
            <div class="flex justify-between text-sm mb-1">
                <span>{{ $item->product_name }} x{{ $item->quantity }}</span>
                <span>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
            </div>
            @endforeach
            <div class="border-t mt-3 pt-3 flex justify-between font-bold">
                <span>Total</span>
                <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
            </div>
        </div>

        {{-- Pilih Metode Bayar --}}
        <form action="{{ route('checkout.confirm', $order->id) }}" method="POST">
            @csrf

            <div class="space-y-3 mb-6">

                <label class="flex items-center gap-3 border rounded-lg p-4 cursor-pointer hover:border-pink-400">
                    <input type="radio" name="payment_method" value="transfer_bca" required>
                    <div>
                        <p class="font-semibold">Transfer BCA</p>
                        <p class="text-sm text-gray-500">No. Rekening: 1234567890 a.n. Toko GlowToSkin</p>
                    </div>
                </label>

                <label class="flex items-center gap-3 border rounded-lg p-4 cursor-pointer hover:border-pink-400">
                    <input type="radio" name="payment_method" value="transfer_mandiri">
                    <div>
                        <p class="font-semibold">Transfer Mandiri</p>
                        <p class="text-sm text-gray-500">No. Rekening: 0987654321 a.n. Toko GlowToSkin</p>
                    </div>
                </label>

                <label class="flex items-center gap-3 border rounded-lg p-4 cursor-pointer hover:border-pink-400">
                    <input type="radio" name="payment_method" value="cod">
                    <div>
                        <p class="font-semibold">COD (Bayar di Tempat)</p>
                        <p class="text-sm text-gray-500">Bayar saat barang sampai</p>
                    </div>
                </label>

            </div>

            <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white py-3 rounded-lg font-semibold">
                Konfirmasi Pesanan
            </button>

        </form>

    </div>
</x-app-layout>