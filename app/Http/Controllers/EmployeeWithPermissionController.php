<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeWithPermissionController extends Controller
{
    private function getPermissions(){

        $userRoleId =auth()->user()->role_id;
        return DB::table('role_wise_permissions')
        ->where('role_id',$userRoleId)
        ->pluck('permission_id')
        ->toArray();
     }
     public function index(Request $request){
        $employees=Employee::with(['department','country'])->get();
        $permissions= $this->getPermissions();
        return view('employeesWithPermissions.index',compact('employees','permissions'));
     }

     public function show($id){
      $employee =Employee::with(['department','country'])->findOrFail($id);
      $permissions = $this->getPermissions();
      return view('employeesWithPermissions.show',compact('employee','permissions'));
     }

     public function edit($id){
      $permissions = $this->getPermissions();
      $employee = Employee::findOrFail($id);
      $departments=Department::all();
      $countries= Country::all();
      return view('employeesWithPermissions.edit',compact('employee','departments','countries','permissions'));
     }

     public function update(Request $request, $id){
      $employee =Employee::findOrFail($id);
      $employee ->update($request->all());
      return redirect()->route('employeesWithPermissions.index')->with('success','Employee update successfully.');
     }
     public function destroy($id){
      $employee= Employee::findOrFail($id);
      $employee->delete();
      return redirect()->route('employeesWithPermissions.index')->with('success','Employee deleted successufully.');
     }
     public function create(){
      $permissions=$this->getPermissions();
      $departments=Department::all();
      $countries =Country::all();
      return view('employeesWithPermissions.create',compact('permissions','countries','departments'));


     }
      public function store(Request $request){
         Employee::create($request->all());
         return redirect()->route('employeesWithPermissions.index')->with('success', 'Employee has been Created!');
      }
   

    }
