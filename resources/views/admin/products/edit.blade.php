@extends('layouts.admin')

@section('content')

<h4 class="mb-4">Edit Produk</h4>

<form action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $product->name }}" class="form-control mb-2">

    <input type="text" name="brand" value="{{ $product->brand }}" class="form-control mb-2">

    <input type="number" name="price" value="{{ $product->price }}" class="form-control mb-2">

    <select name="category_id" class="form-control mb-2">
        @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
        @endforeach
    </select>

    <div class="mb-3">
        <label>Gambar Produk</label>
        <input type="file" name="image" class="form-control">

        @if($product->image)
        <img src="{{ asset('storage/'.$product->image) }}" width="100" class="mt-2">
        @endif
    </div>

    <label>
        <input type="checkbox" name="is_new" {{ $product->is_new ? 'checked' : '' }}>
        Produk Baru
    </label>

    <button class="btn btn-primary mt-2">Update</button>

</form>

@endsection