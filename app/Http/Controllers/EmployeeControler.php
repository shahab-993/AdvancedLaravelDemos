<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Country;

class EmployeeControler extends Controller
{
    public function Index()
    {
          $employees=Employee::with(['department','country'])->get();
           return view('employees.index',compact('employees'));
    }
     public function show($id){
        $employee =Employee::with(['department','country'])->findOrFail($id);
            return view('employees.show',compact('employee'));
     }
     public function edit($id){
        $employee =Employee::with(['department','country'])->findOrFail($id);
                $departments=Department::all();
                $countries=Country::all();
            return view('employees.edit',compact('employee','departments','countries'));
     }
      public function update(Request $request, $id){
        $employee= Employee::findOrFail($id);
        $employee->update($request ->all());
        return redirect()->route('employees.index')->with('success','Employee updated successfully');
      }
      public function destroy( $id){
        $employee= Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success','Employee Deleted successfully');
      }
      public function create(){
          $departments=Department::all();
          $countries=Country::all();
        return view('employees.create',compact('countries','departments'));
      }
      public function store(Request $request){
        
            Employee::create($request->all());
            return redirect()->route('employees.index')->with('success','Employee created successfully');

      }
}
