@extends('layouts.admin')

@section('content')

<h4>Tambah User</h4>

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf

    <input type="text" name="name" class="form-control mb-2" placeholder="Nama">
    <input type="email" name="email" class="form-control mb-2" placeholder="Email">
    <input type="password" name="password" class="form-control mb-2" placeholder="Password">

    <button class="btn btn-success">Simpan</button>
</form>

@endsection