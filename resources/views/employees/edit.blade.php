@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Employee</h1>
            <a href="{{ route('employees.index') }}" class="btn btn-primary">
                Back to Employee List
            </a>
        </div>

        <form action="{{ route('employees.update', $employee['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ $employee['first_name'] }}">
            </div>

            <div class="form-group mb-3">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ $employee['last_name'] }}">
            </div>

            <div class="form-group mb-3">
                <label for="title_name">Title</label>
                <div>
                    <input type="radio" name="title_name" value="Mr"
                        {{ $employee['title_name'] == 'Mr' ? 'checked' : '' }}> Mr
                    <input type="radio" name="title_name" value="Ms"
                        {{ $employee['title_name'] == 'Ms' ? 'checked' : '' }}> Ms
                    <input type="radio" name="title_name" value="Mrs"
                        {{ $employee['title_name'] == 'Mrs' ? 'checked' : '' }}> Mrs
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="has_passport">Has Passport</label>
                <input type="hidden" name="has_passport" value="0">
                <input type="checkbox" name="has_passport" value="1" 
                {{ $employee['has_passport'] ? 'checked' : '' }}>
            </div>

            <div class="form-group mb-3">
                <label for="salary">Salary</label>
                <input type="number" name="salary" class="form-control" value="{{ $employee['salary'] }}">
            </div>
            <div class="form-group mb-3">
                <label for="birth_date">Birth Date</label>
                <input type="date" name="birth_date" class="form-control" value="{{ $employee['birth_date'] }}">
            </div>
            <div class="form-group mb-3">
                <label for="hire_date">Hire Date</label>
                <input type="date" name="hire_date" class="form-control" value="{{ $employee['hire_date'] }}">
            </div>
            <div class="form-group mb-3">
                <label for="notes">Notes</label>
                <textarea name="notes" class="form-control" rows="4">
                    {{ $employee['notes'] }}
                </textarea>
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $employee['email'] }}">
            </div>
            <div class="form-group mb-3">
                <label for="phone_number">Phone Number</label>
                <input type="tel" name="phone_number" class="form-control" value="{{ $employee['phone_number'] }}">
            </div>

            <div class="form-group mb-3">
                <label for="department_id">Department</label>
                <select name="department_id" class="form-control">
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}"
                            {{ $employee['department_id'] == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="country_id">Country</label>
                <select name="country_id" class="form-control">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}"
                            {{ $employee['country_id'] == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>


        </form>

    </div>
@endsection
 