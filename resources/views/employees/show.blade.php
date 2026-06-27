@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="row">
        <div class="col-md-6">
 
            <h1>Employee Details</h1>

            <p><strong>First Name:</strong> {{ $employee->first_name }}</p>
            <p><strong>Last Name:</strong> {{ $employee->last_name }}</p>
            <p><strong>Title:</strong> {{ $employee->title_name }}</p>
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Phone Number:</strong> {{ $employee->phone_number }}</p>
            <p><strong>Department:</strong> {{ $employee->department->name ?? 'N/A' }}</p>
            <p><strong>Country:</strong> {{ $employee->country->name ?? 'N/A' }}</p>
            <p><strong>Salary:</strong> ${{ number_format($employee->salary, 2) }}</p>
            <p><strong>Has Passport:</strong> {{ $employee->has_passport ? 'Yes' : 'No' }}</p>
            <p><strong>Birth Date:</strong> {{ \Carbon\Carbon::parse($employee->birth_date)->format('d-m-Y') }}</p>
            <p><strong>Hire Date:</strong> {{ \Carbon\Carbon::parse($employee->hire_date)->format('d-m-Y') }}</p>
            <p><strong>Notes:</strong> {{ $employee->notes }}</p>

            <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">
                Back to Employee List
            </a>

        </div>
    </div>

</ div>

@endsection