@extends('layouts.admin')

@section('content')

<form action="{{ route('products.bulkDelete') }}" method="POST" id="bulkForm">
    @csrf
    @method('DELETE')

    <div class="d-flex justify-content-between mb-3">
        <h4>Data Produk</h4>
        <div>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                Tambah Produk
            </a>

            <a href="{{ route('products.pdf') }}" class="btn btn-danger">
                Download PDF
            </a>

            <button type="submit" class="btn btn-dark"
                onclick="return confirm('Yakin ingin menghapus produk terpilih?')">
                Hapus Terpilih
            </button>
        </div>
    </div>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th width="30">
                    <input type="checkbox" id="selectAll">
                </th>
                <th>Gambar</th>
                <th>Brand</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    <input type="checkbox" name="ids[]" value="{{ $product->id }}">
                </td>

                <td>
                    @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" width="60" class="rounded">
                    @endif
                </td>

                <td>{{ $product->brand }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? '-' }}</td>
                <td>Rp {{ number_format($product->price,0,',','.') }}</td>

                <td>
                    <a href="{{ route('products.edit',$product) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('products.destroy',$product) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</form>

<script>
document.getElementById('selectAll').addEventListener('click', function() {
    let checkboxes = document.querySelectorAll('input[name="ids[]"]');
    checkboxes.forEach(cb => cb.checked = this.checked);
});
</script>

@endsection