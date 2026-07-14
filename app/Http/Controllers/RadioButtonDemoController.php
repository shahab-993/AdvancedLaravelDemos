<?php

namespace App\Http\Controllers;

use App\Models\AllowanceTypes;
use App\Models\EmployeesAllowances;
use App\Models\PartTimeEmployees;
use Illuminate\Http\Request;

class RadioButtonDemoController extends Controller
{
    public function create()
    {

        $allowanceTypes = AllowanceTypes::all();
        return view('radiobuttondemo.create', compact('allowanceTypes'));
    }
    public function store(Request $request)
    {
        $employee = PartTimeEmployees::create([
            'EmployeeName' => $request->EmployeeName,
            'Salary' => $request->Salary,
            'AllowanceAmount' => $request->AllowanceAmount,
            'NetSalary' => $request->NetSalary,

        ]);
        EmployeesAllowances::create([
            'employee_id' => $employee->id,
            'allowance_type_id' => $request->AllowanceTypeID,
        ]);
        return redirect()->route('workwithradiobuttons.create')->with('success', 'Employee added successfully!');
    }
}
