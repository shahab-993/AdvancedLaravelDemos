@extends('layouts.front.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Assigning Permissions for Role:{{ $role->name }}</h1>

                <a href="{{ route('admin.roles.index') }}" class="btn btn-dark">Back</a>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.roles.permissions', $roleId) }}">
                    @csrf
                    @foreach ($permissions as $permission)
                        <div>
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                    <button type="submit">Save Permissions</button>
                </form>




            </div>
        </div>
    </div>
@endsection
