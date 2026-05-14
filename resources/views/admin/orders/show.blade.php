@extends('layouts.admin') {{-- sesuaikan nama layout kamu --}}

@section('title', 'Detail Pesanan #' . $order->id)

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Detail Pesanan #{{ $order->id }}</h4>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-sm">
            &larr; Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <h6 class="card-subtitle mb-3 text-muted">Informasi Pelanggan</h6>
            <table class="table table-bordered">
                <tr>
                    <th width="200">Nama</th>
                    <td>{{ $order->name }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $order->address }}</td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td>{{ $order->phone }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <span
                            class="badge bg-{{ $order->status === 'pending' ? 'warning' : ($order->status === 'done' ? 'success' : 'secondary') }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Pesan</th>
                    <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection