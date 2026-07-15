<?php

namespace App\Http\Controllers;

use App\Models\AllowanceTypes;
use App\Models\EmployeesAllowances;
use App\Models\PartTimeEmployees;
use Illuminate\Http\Request;

class CheckBoxDemoController extends Controller
{
    public function create(){
        $allowanceTypes=AllowanceTypes::all();
        return view("checkboxdemo.create",compact("allowanceTypes"));

    }
    public function store(Request $request){    
               $employee = PartTimeEmployees::create(
                [
            'EmployeeName' => $request->EmployeeName,
            'Salary' => $request->Salary,
            'AllowanceAmount' => $request->AllowanceAmount, 
            'NetSalary' => $request->NetSalary,
        ]
    );

     $totalAllowance = 0;

        // Insert each allowance into employee_allowances table
        foreach ($request->AllowanceTypeID as $allowanceId) {          

            EmployeesAllowances::create([
                'employee_id' => $employee->id,
                'allowance_type_id' => $allowanceId,
            ]);
        }
    return redirect()->route('workwithcheckboxs.create')->with('success', 'Employee Added Successfully along with Allowances!');
    

    }
}
