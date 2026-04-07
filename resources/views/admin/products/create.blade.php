@extends('layouts.admin')

@section('content')

<h4 class="mb-4">Tambah Produk</h4>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Brand</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="brand" class="form-control">
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="price" class="form-control">
    </div>

    <div class="mb-3">
        <label>Product Type</label>
        <input type="text" name="product_type" class="form-control">
    </div>

    <div class="mb-3">
        <label>Skin Type</label>
        <input type="text" name="skin_type" class="form-control">
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <select name="category_id" class="form-control">
            <option value="">-- Pilih --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
    </div>
    <div class="mb-3">
        <label>
            <input type="checkbox" name="is_new">
            Produk Baru
        </label>
    </div>

    <div class="mb-3">
        <label>Gambar Produk</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button class="btn btn-primary">Simpan</button>

</form>

@endsection