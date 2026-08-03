@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Bulk Update</h2>
        <form action="{{ route('bulkupdates.update') }}" method="POST">
            @csrf
            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Title</th>
                            <th>Has Passport</th>
                            <th>Salary</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Department</th>
                            <th>Country</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            @include('partials.employee_update_fields', [
                                'employee' => $employee,
                                'departments' => $departments,
                                'countries' => $countries,
                            ])
                        @endforeach

                    </tbody>
                </table>  
            </div>
            <button type="submit" class="btn btn-success">Bulk Update</button>
        </form>
    </div>
@endsection
