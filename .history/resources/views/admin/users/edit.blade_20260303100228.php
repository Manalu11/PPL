@extends('layouts.admin')

@section('content')

<h4>Edit User</h4>

<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $user->name }}" class="form-control mb-2">
    <input type="email" name="email" value="{{ $user->email }}" class="form-control mb-2">
    <input type="password" name="password" class="form-control mb-2" placeholder="Kosongkan jika tidak diubah">

    <button class="btn btn-success">Update</button>
</form>

@endsection