@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    {{-- ===== SECTION BANNER ===== --}}
    <div class="card shadow-sm mb-4 p-4">
        <h5 class="fw-bold mb-3">🖼️ Banner Slideshow Promo</h5>

        {{-- Preview banner yang sudah ada --}}
        @if($banners->count())
        <div class="d-flex flex-wrap gap-3 mb-3">
            @foreach($banners as $banner)
            <div class="position-relative" style="width: 200px;">
                <img src="{{ asset('storage/' . $banner->image) }}" class="rounded"
                    style="width:200px; height:100px; object-fit:cover;">
                <form action="{{ route('admin.promotions.banner.destroy') }}" method="POST"
                    onsubmit="return confirm('Hapus banner ini?')">
                    @csrf @method('DELETE')
                    <input type="hidden" name="banner_id" value="{{ $banner->id }}">
                    <button type="submit" class="btn btn-danger btn-sm position-absolute top-0 end-0"
                        style="border-radius: 0 6px 0 6px; padding: 2px 8px;">
                        ✕
                    </button>
                </form>
            </div>
            @endforeach
        </div>
        @else
        <div class="mb-3 p-3 bg-light rounded text-center text-muted small">
            Belum ada banner. Upload banner untuk ditampilkan sebagai slideshow.
        </div>
        @endif

        {{-- Form upload --}}
        <form action="{{ route('admin.promotions.banner.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex align-items-center gap-3">
                <input type="file" name="banners[]" accept="image/*" class="form-control" style="max-width: 400px;"
                    multiple>
                <button type="submit" class="btn btn-danger">Upload Banner</button>
            </div>
            <small class="text-muted mt-1 d-block">
                Bisa pilih beberapa gambar sekaligus.
            </small>
            @error('banners.*')
            <small class="text-danger mt-1 d-block">{{ $message }}</small>
            @enderror
        </form>

        @if(session('success'))
        <div class="alert alert-success mt-3 mb-0">{{ session('success') }}</div>
        @endif
    </div>

    {{-- ===== SECTION MANAJEMEN PROMO ===== --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 fw-bold">Manajemen Promo</h1>
        <a href="{{ route('admin.promotions.create') }}" class="btn btn-danger">
            + Tambah Promo
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama Promo</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Jumlah Produk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($promotions as $promo)
                    <tr>
                        <td class="fw-medium">{{ $promo->name }}</td>
                        <td>{{ $promo->start_date->format('d M Y') }}</td>
                        <td>{{ $promo->end_date->format('d M Y') }}</td>
                        <td>{{ $promo->products_count }} produk</td>
                        <td>
                            @if($promo->isActive())
                            <span class="badge bg-success">Aktif</span>
                            @elseif(now()->lt($promo->start_date))
                            <span class="badge bg-warning text-dark">Belum Mulai</span>
                            @else
                            <span class="badge bg-secondary">Berakhir</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.promotions.edit', $promo) }}"
                                class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.promotions.destroy', $promo) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Hapus promo ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada promo.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection