<?php

namespace App\Http\Controllers;
use App\Exports\EmployeesExport;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


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
}
