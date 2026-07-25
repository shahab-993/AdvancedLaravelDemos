@extends('layouts.app')
@section('content')
    <script src="{{ asset('/') }}js/bulkdeletedemo/script.js"></script>
    <div class="container">
        <h4 class="mb-3">Bulk Delete Demo</h4>

        <form method="POST" action="{{ route('employees.bulkDelete') }}">
            @csrf
            @method('DELETE')

            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">
                            <input type="checkbox" id="selectAll" class="form-check-input">
                        </th>
                        <th scope="col">Title</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Department</th>
                        <th scope="col">Country</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>
                                <input type="checkbox" name="employee_ids[]" value="{{ $employee->id }}"
                                    class="form-check-input employee-checkbox">
                            </td>
                            <td>{{ $employee->title_name }}</td>
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->department ? $employee->department->name : 'N/A' }}</td>
                            <td>{{ $employee->country ? $employee->country->name : 'N/A' }}</td>


                        </tr>
                    @endforeach

                </tbody>
            </table>

            <button type="submit" class="btn btn-danger">Delete Selected Employees</button>


        </form>

    </div>
@endsection
