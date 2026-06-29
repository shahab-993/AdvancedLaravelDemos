@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Employee Query Results</h2>

        @if (isset($results))
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Department</th>
                        <th>Country</th>
                        <th>Salary</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @if (is_iterable($results))
                        @foreach ($results as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->department->name ?? 'N/A' }}</td>
                                <td>{{ $employee->country->name ?? 'N/A' }}</td>
                                <td>{{ $employee->salary }}</td>
                                <td>{{ $employee->email }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>{{ $results->id }}</td>
                            <td>{{ $results->first_name }}</td>
                            <td>{{ $results->last_name }}</td>
                            <td>{{ $results->department->name ?? 'N/A' }}</td>
                            <td>{{ $results->country->name ?? 'N/A' }}</td>
                            <td>{{ $results->salary }}</td>
                            <td>{{ $results->email }}</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        @else
            <p>No results found.</p>
        @endif
    </div>
@endsection
