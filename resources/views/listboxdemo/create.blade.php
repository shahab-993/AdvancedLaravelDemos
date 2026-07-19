@extends('layouts.app')
@section('content')
<script src="{{ asset('js/listboxdemo/script.js') }}"></script>


    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Working with ListBox</h1>
        </div>

        <form class="container" method="POST" action="{{ route('listboxdemo.store') }}">
            @csrf

            <div class="form-group row">
                <label for="EmployeeName">Employee Name</label>
                <div class="col-sm-2">
                    <input class="form-control" type="text" name="EmployeeName" id="EmployeeName" required />
                </div>
            </div>

            <div class="form-group row">
                <label for="salary">Salary</label>
                <div class="col-sm-2">
                    <input class="form-control" type="number" name="salary" id="salary" required />
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <label for="initialList">Available Allowances</label>
                        <select class="form-control" name="initialList[]" id="initialList" multiple>

                            @foreach ($allowanceTypes as $index => $aType)
                                <option
                                    value="{{ $aType->AllowancePercentage }}-{{ $aType->AllowanceTypeName }}-{{ $aType->id }}">
                                    {{ $aType->AllowanceTypeName }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="col-sm-auto">
                        <br />
                        <button type="button" class="btn btn-outline-primary" id="moveRight" disabled>></button><br />
                        <button type="button" class="btn btn-outline-primary" id="moveLeft" disabled>
                            < </button><br />
                                <button type="button" class="btn btn-outline-primary" id="moveAllRight"
                                    disabled>>></button><br />
                                <button type="button" class="btn btn-outline-primary" id="moveAllLeft" disabled>
                                    << </button><br />

                    </div>

                    <div class="col-sm">
                        <label for="finalList">Allowances Entitled For</label>
                        <select class="form-control" name="finalList[]" id="finalList" multiple>

                        </select>

                    </div>

                </div>
            </div>

            <div class="form-group row">
                <label for="allowance">Net Allowance Amount</label>
                <div class="col-sm-2">
                    <input class="form-control" type="number" name="allowance" id="allowance" readonly />
                </div>
            </div>

            <div class="form-group row">
                <label for="netSal">Net Salary</label>
                <div class="col-sm-2">
                    <input class="form-control" type="number" name="netSal" id="netSal" readonly />
                </div>
            </div>



            <button class="btn btn-primary" type="button" id="calculateNetSal">Calculate</button>
            <button class="btn btn-success" type="submit" id="submitButton">Submit</button>


        </form>
    </div>
@endsection
