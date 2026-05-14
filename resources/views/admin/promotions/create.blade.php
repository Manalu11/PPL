@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h4 fw-bold mb-4">Tambah Promo Baru</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.promotions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card shadow-sm p-4">

            {{-- Nama Promo --}}
            <div class="mb-3">
                <label class="form-label fw-medium">Nama Promo</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                    placeholder="Contoh: Harbolnas 12.12">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Tanggal --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-medium">Tanggal Mulai</label>
                    <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control">
                    @error('start_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-medium">Tanggal Selesai</label>
                    <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control">
                    @error('end_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            {{-- Banner Promo --}}
            <div class="mb-3">
                <label class="form-label fw-medium">
                    Banner Promo
                    <small class="text-muted">(opsional, gunakan gambar horizontal/landscape)</small>
                </label>
                <input type="file" name="banner" accept="image/*" class="form-control" onchange="previewBanner(this)">
                <div id="banner_preview" class="mt-2" style="display:none;">
                    <img id="banner_img" src="" class="rounded" style="width:100%; max-height:200px; object-fit:cover;">
                </div>
                @error('banner') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- Pilih Produk --}}
            <div class="mb-4">
                <label class="form-label fw-medium">Pilih Produk & Set Diskon</label>
                <div class="border rounded p-3" style="max-height: 420px; overflow-y: auto;">
                    @foreach($products as $product)
                    <div class="d-flex align-items-center gap-3 p-3 border rounded mb-2">

                        {{-- Checkbox --}}
                        <input type="checkbox" name="products[]" value="{{ $product->id }}"
                            id="product_{{ $product->id }}" class="form-check-input mt-0"
                            onchange="toggleDiscount({{ $product->id }}, this.checked)">

                        {{-- Gambar --}}
                        <img src="{{ asset('storage/'.$product->image) }}"
                            style="width:50px; height:50px; object-fit:contain;">

                        {{-- Info Produk --}}
                        <div class="flex-grow-1">
                            <p class="fw-semibold mb-0 small">{{ $product->brand }}</p>
                            <p class="text-muted mb-0" style="font-size:12px;">{{ $product->name }}</p>
                            <p class="text-danger fw-semibold mb-0 small">Rp {{ number_format($product->price) }}</p>
                        </div>

                        {{-- Input Diskon --}}
                        <div id="discount_wrap_{{ $product->id }}" class="d-flex align-items-center gap-2 d-none">
                            <input type="number" name="discounts[{{ $product->id }}]" id="discount_{{ $product->id }}"
                                min="1" max="100" placeholder="%" class="form-control form-control-sm text-center"
                                style="width: 70px;"
                                oninput="updateFinalPrice({{ $product->id }}, {{ $product->price }}, this.value)">
                            <div style="font-size:12px;" class="text-muted">
                                <div>Harga akhir:</div>
                                <div id="final_price_{{ $product->id }}" class="text-danger fw-semibold">-</div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger px-4">Simpan Promo</button>
                <a href="{{ route('admin.promotions.index') }}" class="btn btn-secondary px-4">Batal</a>
            </div>

        </div>
    </form>
</div>

<script>
function previewBanner(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('banner_img').src = e.target.result;
            document.getElementById('banner_preview').style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function toggleDiscount(id, checked) {
    const wrap = document.getElementById('discount_wrap_' + id);
    if (checked) {
        wrap.classList.remove('d-none');
    } else {
        wrap.classList.add('d-none');
        document.getElementById('discount_' + id).value = '';
        document.getElementById('final_price_' + id).textContent = '-';
    }
}

function updateFinalPrice(id, originalPrice, discount) {
    const el = document.getElementById('final_price_' + id);
    if (discount > 0 && discount <= 100) {
        const final = originalPrice - (originalPrice * discount / 100);
        el.textContent = 'Rp ' + Math.round(final).toLocaleString('id-ID');
    } else {
        el.textContent = '-';
    }
}
</script>
@endsection