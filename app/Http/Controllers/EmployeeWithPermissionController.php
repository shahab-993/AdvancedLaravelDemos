<?php

namespace App\Http\Controllers;

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
    }
