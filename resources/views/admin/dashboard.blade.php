@extends('layouts.admin')

@section('content')

<h4 class="mb-4">Welcome Admin 👑</h4>

<div class="row">
    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h3>{{ $totalProducts }}</h3>
            <small>Produk</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h3>{{ $totalUsers }}</h3>
            <small>Users</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center">
            <h3>{{ $totalOrders }}</h3>
            <small>Orders</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm p-3 text-center bg-danger text-white">
            <h3>Rp {{ number_format($totalIncome, 0, ',', '.') }}</h3>
            <small>Income</small>
        </div>
    </div>
</div>

@endsection