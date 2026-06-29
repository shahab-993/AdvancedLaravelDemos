@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="my-4">Employee Filler</h2>
    <!-- <form action="{{ route('employeefilter.index') }}" method="GET" class="row g-3 align-items-end"> -->
    <form action="{{ route('employeeQB.index') }}" method="GET" class="row g-3 align-items-end">
        <div class="row mb-3">
            <!-- search field -->
            <div class="col mb-3">
                <label for="search"> Search</label>
                <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Search">
            </div>
            <!-- Country Select -->
            <div class="col mb-3">
                <label for="country_id">Country</label>
                <select name="country_id" id="country_id" class="form-select">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country )
                    <option value="{{ $country->id }}"
                        {{ request('country_id') == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- Department  Select ( Multiple)-->
            <div class="col mb-3">
                <label for="departmentSelect">Department</label>
                <select name="department_ids[]" class="form-select" multiple="multiple" id="departmentSelect">
                    @foreach ($departments as $department )
                    <option value="{{ $department->id }}"
                        {{ in_array($department->id, (array) request('department_ids', [])) ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <!-- start date field  -->
            <div class="col mb-3">
                <label for="brith_date">Start Date</label>
                <input type="date" name="start_date"
                    value="{{ request('start_date') }}"
                    class="form-control"
                    id="start_date">
            </div>

            <!-- End date field  -->
            <div class="col mb-3">
                <label for="hier_date">End Date</label>
                <input type="date" name="end_date"
                    value="{{ request('end_date') }}"
                    class="form-control"
                    id="end_date">
            </div>
            <!-- submit button  -->
            <div class="col mb-2">
                <button type="submit" class="btn btn-primary w-100 mt-4">Filter</button>
            </div>

        </div>

    </form>

    @if ($employees->isNotEmpty())
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Birth date</th>
                <th>Hire date</th>
                <th>Email</th>
                <th>Counrty</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name}}</td>
                {{-- <td>{{ $employee->department->name}}</td> --}}
                <td>{{ $employee->departmentname}}</td>
                <td>{{ $employee->salary}}</td>
                <td>{{ $employee->birth_date}}</td>
                <td>{{ $employee->hire_date}}</td>
                <td>{{ $employee->email}}</td>
                {{-- <td>{{ $employee->country->name }}</td> --}}
                <td>{{ $employee->countryname }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>

    @else
    <p>No employees found.</p>

    @endif
</div>
@endsection