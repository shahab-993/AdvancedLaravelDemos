@extends('layouts.app')
@section('content')
        <h1>Bulk Insert Employees</h1>
        <br><br>
        <form action="{{ route('bulkinserts.store') }}" method="POST">
            @csrf


        </form>
        <button type="button" class="btn btn-success" onclick="addEmployee()" >Add Row</button><br><br>
        <button type="button" class="btn btn-primary"  >Bulk Insert Employees</button>
    
@endsection