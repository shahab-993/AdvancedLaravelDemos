<?php

namespace App\Http\Controllers;

use App\Models\TempEmployee;
use Illuminate\Http\Request;

class TemporaryEmployeeController extends Controller
{
      public function index()  {
        $employees = TempEmployee::all();
        return view("temporary_employees.index", compact("employees"));
      }

      public function create(){
        return view("temporary_employees.create");
      }
      public function store(Request $request){
        return redirect()->route('temporary-employee.index')->with('success', 'Added Successfully!!');
      }
}

