<?php

namespace App\Http\Controllers;
use App\Exports\EmployeesExport;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


class EmployeeExportController extends Controller
{
   public function index(){
    $employees =Employee::all();
    return view('employeesexport.index',compact('employees'));
   }

   public function exportPdf(){
      $employees= Employee::all();
      $pdf = PDF::loadView('employeesexport.export_pdf',compact('employees'));
      return $pdf->download('employees.pdf');
   }
   public function exportExcel(){
      return Excel::download(new EmployeesExport, 'employees.xlsx');
   }
  
   public function exportCsv(){
      return Excel::download(new EmployeesExport, 'employees.csv');
   }
   public function exportTxt(){
      $employees =Employee::with(['department', 'country'])->get();
      $fileName='employees.txt';
      $txtData='';
      $txtData .= implode(' - ',[
            'First Name',
            'Last Name',
            'Title Name',
            'Email',
            'Department',
            'Country',
            'Notes',
          
      ]).  "\n";
      foreach($employees as $employee )
         {
            $txtData.=implode(' - ', [
               $employee->first_name,
               $employee->last_name,
               $employee->title_name,
               $employee->email,
               $employee->department->name ?? 'N/A',
               $employee->country->name ?? 'N/A',
               $employee->notes,
            
            ]). "\n";
         }
         Storage::put($fileName,$txtData);
         return Storage::download($fileName);

   }
 }
