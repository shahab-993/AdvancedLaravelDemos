@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Title</th>
                <th>Email</th>
                <th>Department</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody id="employeeTable">
            @foreach ($employees as $employee )
            <tr>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->title_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->departmen ? $employee->department->name: 'N/A' }}</td>
                <td>{{ $employee->country ? $employee->country->name: 'N/A' }}</td>
            </tr>
                
            @endforeach

        </tbody>
    </table>
        <a href="{{ route('employees.export.pdf') }}" class="btn btn-danger"> Export PDF</a>
        <a href="{{ route('employees.export.excel') }}" class="btn btn-success"> Export Excel</a>
        <a href="{{ route('employees.export.csv') }}" class="btn btn-primary"> Export Csy</a>
        <a href="{{ route('employees.export.txt') }}" class="btn btn-primary"> Export Text</a>
        <a href="{{ route('employees.export.word') }}" class="btn btn-primary"> Export Word</a>

</div>
    
@endsection