@extends('layouts.front.app')
@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Create Roles</h1>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-dark">Back to Roles List</a>
        </div>

        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Role Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save Role</button>
        </form>

    </diV>
@endsection
