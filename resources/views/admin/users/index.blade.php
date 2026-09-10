@extends('layouts.front.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">


                <a href="{{ route('admin.register') }}" class="btn btn-primary mb-3">
                    Add New user
                </a>


                <a href="{{ route('adminhome') }}" class="btn btn-dark mb-3">
                    Back
                </a>

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


                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Country</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Lock/Unlock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->country_id ? $user->country->name : 'N/A' }}</td>
                                <td>{{ $user->role_id ? $user->role->name : 'N/A' }}</td>
                                <td>
                                    <span class="badge bg-{{ $user->is_locked ? 'danger' : 'success' }}">
                                        {{ $user->is_locked ? 'Locked' : 'Active' }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.users.toggleBlock', $user->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-{{ $user->is_locked ? 'success' : 'danger' }}">
                                            {{ $user->is_locked ? 'Unlock' : 'Lock' }}
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm"
                                        title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </a> |
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm"
                                        title="Edit User">
                                        <i class="bi bi-pencil"></i>
                                    </a> |
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete User"
                                            onclick="return confirm('Are you sure you want to delete this user?');">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
