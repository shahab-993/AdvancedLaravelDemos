@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="mb-3"> Using Radio Button as Row Selector</h4>
    <form action="{{ route('employees.delete') }}" method="POST">
    @csrf
    @method('DELETE')
    <Table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th scope="col">Select a Row</th>
                <th scope="col">Title</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Department</th>
                <th scope="col">Country</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee )
            <tr>
                <td><input type="radio" name="employee_id" value="{{ $employee->id }}"
                class="form-check-input" required></td>
                <td>{{ $employee->title_name }}</td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->department ? $employee->department->name: 'N/A' }}</td>
                <td>{{ $employee->country ? $employee->country->name: 'N/A' }}</td>
            </tr>
                
            @endforeach
        </tbody>

    </Table>
    <button type="submit" class="btn btn-danger">Delete Selected Employee</button>
    </form>

</div>
    
@endsection