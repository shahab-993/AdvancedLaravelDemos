@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Upload and Download Files Demo</h1>

        <!-- Create Employee Button -->
        <a href="{{ route('temporary-employees.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-person-plus"></i> Create Employee
        </a>


        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>
                                <a href="{{ route('temporary-employees.show', $employee->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Details
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
