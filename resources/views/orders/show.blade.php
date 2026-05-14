<x-app-layout>
    <div class="p-8">
        <h1 class="text-2xl font-bold mb-6">
            Detail Pesanan #{{ $order->id }}
        </h1>

        <div class="bg-white p-6 rounded shadow mb-6">
            <p><strong>Nama:</strong> {{ $order->name }}</p>
            <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y') }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h2 class="font-semibold mb-4">Produk</h2>

            @foreach($order->items as $item)
                <div class="flex justify-between border-b py-2">
                    <span>{{ $item->product->name }}</span>
                    <span>{{ $item->quantity }} x Rp {{ number_format($item->price) }}</span>
                </div>
            @endforeach

            <div class="text-right mt-4 font-bold">
                Total: Rp {{ number_format($order->total_price) }}
            </div>
        </div>
    </div>
</x-app-layout>