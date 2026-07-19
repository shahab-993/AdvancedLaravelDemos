<?php

namespace App\Http\Controllers;

use App\Models\AllowanceTypes;
use App\Models\EmployeesAllowances;
use App\Models\PartTimeEmployees;
use Illuminate\Http\Request;

class ListBoxDemoController extends Controller
{
     public function create(){
            $allowanceTypes=AllowanceTypes::all();
            return view('listboxdemo.create', compact('allowanceTypes'));
     } 
      public function store(Request $request){
       //  dd($request->all());
        $netSalary = $request->input('netSal'); 

        $partTimeEmployee = new PartTimeEmployees();
        $partTimeEmployee->EmployeeName = $request->input('EmployeeName');
        $partTimeEmployee->Salary = $request->input('salary');
        $partTimeEmployee->AllowanceAmount = $request->input('allowance');
  $partTimeEmployee->NetSalary = $netSalary;
$partTimeEmployee->save();

// د finalList څخه ډاټا ترلاسه کول (که نه وي نو خالي array)
$allowanceData = $request->input('finalList', []);

// که چیرته ډاټا موجوده وي نو پروسس یې کړئ
if (!empty($allowanceData)) {
    foreach ($allowanceData as $allowance) {
        $data = explode('-', $allowance);
        $allowanceTypeId = end($data); // وروستی عنصر (id) ترلاسه کول
        
        $employeeAllowance = new EmployeesAllowances();
        $employeeAllowance->employee_id = $partTimeEmployee->id;
        $employeeAllowance->allowance_type_id = $allowanceTypeId;
        $employeeAllowance->save();
    }
}

return redirect()->route('listboxdemo.create')->with('success', 'Employee added successfully along with Allowances!');


    }
}
