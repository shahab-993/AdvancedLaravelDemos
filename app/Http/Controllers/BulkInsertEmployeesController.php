<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BulkInsertEmployeesController extends Controller
{
    public function create(){
        $departments =Department::all();
        $countries= Country::all();
        return view('bulkinsert.create',compact('departments','countries'));

    }
    public function store(Request $request){
        //  dd($request->employees); 

        $employeesData=[];
        foreach($request->employees as $employee){
            $employeesData[]=[

                'first_name' => $employee['first_name'],
                'last_name' =>$employee['last_name'],
                'has_passport'=>isset($employee['has_passport'])? 1 :0,
                'title_name' =>$employee['title_name'],
                'email' => $employee['email'],
                'phone_number' => $employee['phone_number'] ?? null,
                'birth_date' => $employee['birth_date'] ?? null,
                'hire_date' => $employee['hire_date'] ?? null,
                'department_id' => $employee['department_id'],
                'country_id' => $employee['country_id'],
                'created_at'=> now(),
                'updated_at'=> now(),
            ];
        


        }
        DB::table('employees')->insert($employeesData);
        return redirect()->route('bulkinserts.create')->with('success', 'Employees inserted successfully!');
        
         

    }
}
