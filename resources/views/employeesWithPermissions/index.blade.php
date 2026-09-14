@extends('layouts.front.app')
@section('content')
    <div class="container mt-5">
        <h1>Manage Employees</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (in_array(1, $permissions))
            <a href="{{ route('employeesWithPermissions.create') }}" class="btn btn-primary mb-3">Add New Employee</a>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Title</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Country</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->title_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ isset($employee->department) ? $employee->department->name : 'N/A' }}</td>
                        <td>{{ isset($employee->country) ? $employee->country->name : 'N/A' }}</td>
                        <td>{{ $employee->notes }}</td>

                        <td>
                            @if (in_array(5, $permissions))
                                <a href="{{ route('employeesWithPermissions.show', $employee->id) }}"
                                    class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                            @endif
                            |
                            @if (in_array(2, $permissions))
                                <a href="{{ route('employeesWithPermissions.edit', $employee->id) }}"
                                    class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                            @endif

                            |
                            @if (in_array(3, $permissions))
                                <form action="{{ route('employeesWithPermissions.destroy', $employee->id) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this employee?');">Delete
                                    </button>
                                </form> |
                            @endif


                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
