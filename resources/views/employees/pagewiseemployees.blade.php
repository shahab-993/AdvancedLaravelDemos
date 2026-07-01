@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <table class="table table-striped">
        <div class="me-3">
            <label for="recordsPerPage" class="form-label"> Records per page: </label>
            <select name="recordsPerPage" id="recordsPerPage" class="form-select" 
            onchange="changePagination()">
            @foreach ($paginationOptions as $option )
            <option value="{{ $option }}" {{ request()->get('perPage')==$option ? 'selected': ''}}>
            {{ $option }}
            </option>
                
            @endforeach

            </select>
        </div>
        <thead>
            <tr>
                <!-- <th>First Name</th>
                <th>Last Name</th>
                <th>Title</th>
                <th>Email</th>
                <th>Department</th>
                <th>Country</th> -->
                <th onclick="sortTable('first_name')" class="cursor_pointer">First Name <span id="first_name_arrow"></span></th>
                <th onclick="sortTable('last_name')" class="cursor_pointer">Last Name <span id="last_name_arrow"></span></th>
                <th onclick="sortTable('title_name')" class="cursor_pointer">Title <span id="title_name_arrow"></span></th>
                <th onclick="sortTable('email')" class="cursor_pointer">Email<span id="email_arrow"></span></th>
                <th onclick="sortTable('department')" class="cursor_pointer">Department<span id="department_arrow"></span></th>
                <th onclick="sortTable('country')" class="cursor_pointer">Country<span id="country_arrow"></span></th>
            </tr>
        </thead>
        <tbody id="employeeTable">
            @foreach ($employees as $employee )
            <tr>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->title_name }}</td>
                <td>{{ $employee->email}}</td>
                <td>{{ $employee->department ? $employee->department->name : 'N/A'}}</td>
                <td>{{ $employee->country ? $employee->country->name: 'N/A'}}</td>
            </tr>
                
            @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $employees->links() }}
    </div>
    

</div>
<script>
    function changePagination(){
        let perPage=document.getElementById('recordsPerPage').value;
        window.location.href= `?perPage=${perPage}`;


    }
    
</script>
    
@endsection