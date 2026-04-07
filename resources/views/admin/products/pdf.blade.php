<h2>Laporan Produk</h2>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Brand</th>
        <th>Kategori</th>
        <th>Harga</th>
    </tr>

    @foreach($products as $product)
    <tr>
        <td>
            @php
            $path = public_path('storage/'.$product->image);
            @endphp

            @if(file_exists($path))
            <img src="data:image/{{ pathinfo($path, PATHINFO_EXTENSION) }};base64,{{ base64_encode(file_get_contents($path)) }}"
                width="80">
            @endif
        </td>
        </td>
        < <td>{{ $product->name }}</td>
            <td>{{ $product->brand }}</td>
            <td>{{ $product->category->name ?? '-' }}</td>
            <td>Rp {{ number_format($product->price,0,',','.') }}</td>
    </tr>
    @endforeach
</table>