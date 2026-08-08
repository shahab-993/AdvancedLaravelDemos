
@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Uplode and Download File Demo</h1>
    <!-- Create Employee Button  -->
     <a href="{{ route('temporary-employee.create') }}" class="btn btn-primary mb-3">Create Employee</a>
    <div class="table table-responsive">
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
                @foreach ($employees as $employee )
                    {{ $employee->id }}
                    {{ $employee->first_name }}
                    {{ $employee->last_name }}
                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection