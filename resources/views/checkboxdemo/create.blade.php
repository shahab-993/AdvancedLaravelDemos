@extends('layouts.app')
@section('content')
<script src="{{ asset('js/checkbox/script.js') }}"></script>
   <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center mb-4"></div>
      <h1>Working with CheckBox </h1>
   
   <form action="{{ route('workwithcheckboxs.create') }}" method="POST" id="employeeForm">
      @csrf
      <div class="form-group mb-3">
         <label for="first_name">Employee Name</label>
         <input type="text" name="EmployeeName" id="EmployeeName" class="form-control" required>
      </div>
      <div class="form-group mb-3">
         <label for="first_name">Salary</label>
         <input type="text" name="Salary" id="Salary" class="form-control" required>
      </div>
      <div class="form-group mb-3">
         <label for="">Allowance Type</label><br>
         @foreach ($allowanceTypes as $allowance)
            <label for="">
               <input type="checkbox" name="AllowanceTypeID[]" value="{{ $allowance->id }}"
                  data-percentage="{{ $allowance->AllowancePercentage }}" required onchange="CalculateSalary()">
               {{ $allowance->AllowanceTypeName }} ({{ $allowance->AllowancePercentage }}%)
            </label>
         @endforeach
      </div>

      <div class="form-group mb-3">
         <label for="AllowanceAmount">Allowace Amount</label>
         <input type="text" name="AllowanceAmount" id="AllowanceAmount" class="form-control" readonly>
      </div>

      <div class="form-group mb-3">
         <label for="NetSalary">Net Salary</label>
         <input type="text" name="NetSalary" id="NetSalary" class="form-control" readonly>
      </div>


      <button type="submit" class="btn btn-primary">Save</button>

   </form>
   </div>

@endsection