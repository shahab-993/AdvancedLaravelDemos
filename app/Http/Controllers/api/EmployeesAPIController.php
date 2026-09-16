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
}
