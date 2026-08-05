<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Employee;
use Illuminate\Http\Request;


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
}
