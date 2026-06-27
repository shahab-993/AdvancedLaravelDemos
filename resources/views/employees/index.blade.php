@extends('layouts.app')
@section('content')
            <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3"> Add New Employee</a>
      <table class="table table-striped">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</span></th>
                <th>Title</span></th>
                <th>Email</span></th>
                <th>Department</span></th>
                <th>Country</span></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="employeeTable">
                 @foreach ($employees as $employee)
                 <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                    <td>{{ $employee->title_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->department ? $employee->department->name: 'N/A' }}</td>
                    <td>{{ $employee->country ? $employee->country->name: 'N/A' }}</td>
                    <td>
                    <a href="{{ route('employees.show', $employee['id']) }}" class="btn btn-info btn-sm">Details</a> |
                    <a href="{{ route('employees.edit', $employee['id']) }}" class="btn btn-warning btn-sm">Edit</a> |
                     <form Action="{{ route('employees.destroy',$employee->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to Delete it')" class="btn btn-danger">Delete</button>

                     </form>
                    </td>
                 </tr>
                     
                 @endforeach
        </tbody>
      </table>


@endsection