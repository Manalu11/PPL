@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Data Pesanan</h4>
</div>

<table class="table table-bordered bg-white">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nama Pemesan</th>
            <th>Barang Dipesan</th>
            <th>Total</th>
            <th>Status</th>
            <th>Update Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>#{{ $order->id }}</td>

            <td>{{ $order->name }}</td>

            {{-- Jika relasi many to many --}}
            <td>
                @if($order->items->count())
                @foreach($order->items as $item)
                <div>
                    {{ $item->product_name }} ({{ $item->quantity }}x)
                </div>
                @endforeach
                @else
                <span class="text-muted">Tidak ada item</span>
                @endif
            </td>

            <td>Rp {{ number_format($order->total,0,',','.') }}</td>

            <td>
                @if($order->status == 'pending')
                <span class="badge bg-warning text-dark">Pending</span>
                @elseif($order->status == 'paid')
                <span class="badge bg-success">Sudah Bayar</span>
                @elseif($order->status == 'shipped')
                <span class="badge bg-info">Dikirim</span>
                @elseif($order->status == 'rejected')
                <span class="badge bg-danger">Ditolak</span>
                @else
                <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                @endif
            </td>

            {{-- Update Status --}}
            <td>
                <form action="{{ route('orders.updateStatus',$order) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <select name="status" class="form-select form-select-sm mb-1">
                        <option value="pending">Pending</option>
                        <option value="paid">Sudah Bayar</option>
                        <option value="shipped">Dikirim</option>
                        <option value="rejected">Tolak</option>
                    </select>

                    <button class="btn btn-primary btn-sm w-100">
                        Update
                    </button>
                </form>
            </td>

            {{-- Aksi --}}
            <td>
                <a href="{{ route('orders.show',$order) }}" class="btn btn-info btn-sm">
                    Detail
                </a>

                <form action="{{ route('orders.destroy',$order) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection