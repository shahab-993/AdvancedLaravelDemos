<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeExportController extends Controller
{
   public function index(){
    $employees =Employee::all();
    return view('employeesexport.index',compact('employees'));
   }
}
