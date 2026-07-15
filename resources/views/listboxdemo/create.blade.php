@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Working with listBox</h1>
    </div>
    <form class="container" method="POST" action="{{ route('listboxdemo.store') }}">
        @csrf
         <div class="form-group row">
            <label for="EmployeeName"> Employee Name</label>
            <div class="col-sm-2">
                <input type="text" class="form-control"
                 name="EmployeeName"
                 id="EmployeeName" required> 
            </div>
            <div class="form-group row">
                <label for="salary" >Salary</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="salary"
                    id="salary" required>
                </div>
            </div>


         </div>

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <label for="initialList" >Available Allowances</label>
                    <select name="initialList[]" id="initialList" class="form-control" multiple>
                        @foreach ($allowanceTypes as $index => $aType )
                        <option value="{{ $aType->AllowancePercentage }}-{{ $aType->AllowanceTypeName }}-{{ $aType->id }}">
                            {{ $aType->AllowanceTypeName }}
                        </option>
                        
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-auto">
                        <br/>
                        <button type="button" class="btn btn-outline-primary" id="moveRight" disabled>></button><br/>
                        <button type="button" class="btn btn-outline-primary" id="moveLeft" disabled><</button><br/>
                        <button type="button" class="btn btn-outline-primary" id="moveRight" disabled>>></button><br/>
                        <button type="button" class="btn btn-outline-primary" id="moveLeft" disabled><<</button><br/>
                </div>
                <div class="col-sm">
                        <label for="finalList">Allowances Entitled For</label>
                        <select name="finalList[]" id="finalList" class="form-control" multiple>
                            <!-- <option> please Select</option> -->
                        </select>

                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="allowance"> Net Allowances Amount</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="allowance"
                 id="allowance" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="netSal"> Net Salary</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="netSal"
                 id="netSal" readonly>
            </div>
        </div>
        <button class="btn btn-primary" type="button" id="calculateNetSal">Caculate</button>
        <button class="btn btn-success" type="submit" id="submitButton">Submit</button>

    </form>



</div>

    
@endsection