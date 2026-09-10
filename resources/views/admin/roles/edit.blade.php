@extends('layouts.front.app')
@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Role</h1>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-dark">Back to Roles List</a>
        </div>
        <div>
            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Role Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $role->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>


    </div>
@endsection
