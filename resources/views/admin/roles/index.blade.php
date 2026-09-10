@extends('layouts.front.app')
@section('content')
    <div class="container mt-5">
        <h1>Roles</h1>

        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary mb-3">Add New Roles</a>

        <a href="{{ route('adminhome') }}" class="btn btn-dark mb-3">Back</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="{{ route('admin.roles.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a> |

                            <form action="{{ route('admin.roles.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this role?');">Delete
                                </button>
                            </form> |

                            <a href="{{ route('admin.roles.permissions', $item->id) }}" class="btn btn-primary btn-sm"
                                title="Permssions">
                                Assign Permissions
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>
@endsection
