<?php

namespace App\Http\Controllers;
use App\Exports\EmployeesExport;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpOffice\PhpWord\Writer\Word2007;



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
   public function exportWord(){
      $employees=Employee::with(['department', 'country'])->get();
      $phpWord= new PhpWord();
      $section =$phpWord->addSection();

      $tableStyle = [
         'borderSize'=> 6,
         'borderColor' =>'999999',
         'cellMargin' => 80,
      ];
      $phpWord->addTableStyle('Employee Table',$tableStyle);
      $table = $section->addTable('Employee Table');
      $table->addRow();
      $table->addCell(2000)->addText('First Name');
      $table->addCell(2000)->addText('Last Name');
      $table->addCell(2000)->addText('Title Name');
      $table->addCell(2000)->addText('Email');
      $table->addCell(2000)->addText('Department');
      $table->addCell(2000)->addText('Country');
      $table->addCell(2000)->addText('Notes'); 


      foreach($employees as $employee){
       $table->addRow();
      $table->addCell(2000)->addText($employee->first_name);
      $table->addCell(2000)->addText($employee->last_name);
      $table->addCell(2000)->addText($employee->title_name);
      $table->addCell(2000)->addText($employee->email);
      $table->addCell(2000)->addText($employee->department->name ?? 'N/A');
      $table->addCell(2000)->addText($employee->country->name ?? 'N/A');
      $table->addCell(2000)->addText($employee->notes);


   }
    $fileName= 'employees.docx';
    $tempFilePath =storage_path('app/'.$fileName);
     
    $writer = IOFactory::createWriter($phpWord,'Word2007');
    $writer->save($tempFilePath);

    return response()->download($tempFilePath)->deleteFileAfterSend(true);
   }
 
 }
