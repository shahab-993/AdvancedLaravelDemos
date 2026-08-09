<?php

namespace App\Http\Controllers;

use App\Models\EmployeeCertificate;
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
        $validated = $request->validate([
          "first_naem"=> "required|string",
          'last_name'=> 'required|string',
          'cv'=> 'required|file|mimes:pdf,doc,docx',
          'phoot'=> 'required|image|mimes:png,jpg,jpeg',
          'pan_card'=> 'requird|image|mimes:jpeg,png,jpg',
          'certificates.*'=> 'file|mimes:pdf,jpeg,png,jpg',
          ]);

          //Store cv
          $cvPath=$request->file('cv')->storeAs(
            'employee_files/cv',
            "{$validated[first_name]}.{$request->file('cv')->getClientOriginalExtension()}"
            //Store Photo
          );
          $cvPath=$request->file('photo')->storeAs(
            'employee_files/cv',
            "{$validated[first_name]}.{$request->file('photo')->getClientOriginalExtension()}"
          );
           //Store Pan Card
           $panCardContent = file_get_contents($request->file("pan_card"));
            //Save the Employee Data 
            $employee= TempEmployee::create([
              "first_name"=> $validated["first_name"],
              "last_name"=> $validated["last_name"],
              "cv"=> $cvPath,
              "pan_card"=> $panCardContent,
            ]);
             // Store Certificates
             if($request->has("certificates")){
              foreach($request->certificates as $certificate){
                $certificateModel=EmployeeCertificate::create([
                  "tem_emp_id"=> $employee->id,
                  "certificate_name"=> '',//Temp value to Update later
                ]); 
                $certificatePath=$certificate->storeAs(
                  "employee_files/certificates/{$employee->id}",
                  "{$employee->id}_{$employee->file_name}_{$certificateModel->id}.{$certificate->getOriginalExtension()}");

                  $certificateModel->update([
                    'certificate_name'=> $certificatePath,
                  ]);
              }
             }





        return redirect()->route('temporary-employee.index')->with('success', 'Added Successfully!!');
      }
}

