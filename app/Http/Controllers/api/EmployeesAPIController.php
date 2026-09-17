<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesAPIController extends Controller
{
    public function index(){
        $employees = Employee::with(['department','country'])->get();
        return response()->json($employees);
        
    }
    public function show($id){
        $employee = Employee::with(['department','country'])->findOrFail($id);
        return response()->json($employee);

    }
public function store(Request $request)
{
    $employee= Employee::create($request->all());
    return response()->json([
        'message'=>'Employee created successfully!','employee'=>$employee
    ],201);
}


public function update(Request $request,$id){

$employee = Employee::findOrFail($id);
$employee->update($request->all());
return response()->json([
    'message'=>'Employee updated successfully!',
    'employee'=>$employee
],200);

}

public function destroy($id){
    $employee =Employee::findOrFail($id);
    $employee->delete();
    return response()->json([
        'message'=>'Employee deleted successfully!',
       'employee'=> $employee
    ]);

}
}
