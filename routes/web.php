<?php

use App\Http\Controllers\BulkInsertEmployeesController;
use App\Http\Controllers\BulkUpdateEmployeesController;
use App\Http\Controllers\CascadingDropDownListsDemoController;
use App\Http\Controllers\CheckBoxDemoController;
use App\Http\Controllers\DeleteBulkRowsUsingCheckBoxController;
use App\Http\Controllers\DeletSingleRowUsingRadioButtonController;
use App\Http\Controllers\EmployeeControler;
use App\Http\Controllers\EmployeeExportController;
use App\Http\Controllers\EmployeeFiltersController;
use App\Http\Controllers\ListBoxDemoController;
use App\Http\Controllers\QueryBuilderDemoController;
use App\Http\Controllers\RadioButtonDemoController;
use App\Http\Controllers\TemporaryEmployeeController;
use App\Http\Controllers\ValidationsDemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees',[EmployeeControler::class,'index'])->name('employees.index');
Route::get('/employees/{id}/edit',[EmployeeControler::class,'edit'])->name('employees.edit');
Route::get('/employees/{id}',[EmployeeControler::class,'show'])->name('employees.show');

Route::put('/employees/{id}',[EmployeeControler::class,'update'])->name('employees.update');
Route::delete('/employees/delete/{id}',[EmployeeControler::class,'destroy'])->name('employees.destroy');
Route::get('employee/create',[EmployeeControler::class,'create'])->name('employees.create');
Route::post('employee',[EmployeeControler::class,'store'])->name('employees.store');



Route::get('/validationsdemo',[ValidationsDemoController::class,'create'])->name('validationsdemo.create');
Route::post('/validationsdemo',[ValidationsDemoController::class,'store'])->name('validationsdemo.store');

Route::get('/employeefilters',[EmployeeFiltersController::class,'index'])->name('employeefilter.index');
Route::get('/employeequreryfilters',[EmployeeFiltersController::class,'queryfilter'])->name('employeefilters.queryfilter');
Route::get('/employeeQueryBilder',[QueryBuilderDemoController::class,'index'])->name('employeeQB.index');

Route::get('/pagewiseemployees',[EmployeeControler::class,'pageWiseEmployee'])->name('employees.pagewiseemployees');

Route::post('/search',[EmployeeControler::class,'search'])->name('employees.search');


Route::get('/workwithradiobuttons',[RadioButtonDemoController::class, 'create'])->name('workwithradiobuttons.create');
Route::post('/workwithradiobuttons ',[RadioButtonDemoController::class, 'store'])->name('workwithradiobuttons.store');

Route::get('/workwithcheckboxs',[CheckBoxDemoController::class, 'create'])->name('workwithcheckboxs.create');
Route::post('/workwithcheckboxs',[CheckBoxDemoController::class, 'store'])->name('workwithcheckboxs.store');

Route::get('/listboxdemo',[ListBoxDemoController::class, 'create'])->name('listboxdemo.create');
Route::post('/listboxdemo',[ListBoxDemoController::class, 'store'])->name('listboxdemo.store');

Route::get('/cascadingdropdowndemo',[CascadingDropDownListsDemoController::class, 'getCountries'])->name('cascadingdropdowndemo');


Route::get('/get-states/{country_id}',[CascadingDropDownListsDemoController::class, 'getState'])->name('get-states');


Route::get('/get-cities/{state_id}',[CascadingDropDownListsDemoController::class, 'getCities'])->name('get-cities');


Route::get('/single-delete',[DeletSingleRowUsingRadioButtonController::class, 'index'])->name('singleDelete');
Route::delete('/employee-delete',[DeletSingleRowUsingRadioButtonController::class, 'destroy'])->name('employees.delete');

Route::get('/bulk-delete', [DeleteBulkRowsUsingCheckBoxController::class, 'index'])->name('bulkemployees.index');
Route::delete('/employees/bulk-delete', [DeleteBulkRowsUsingCheckBoxController::class, 'destroy'])->name('employees.bulkDelete');


Route::get('/bulkinserts', [BulkInsertEmployeesController::class, 'create'])->name('bulkinserts.create');
Route::post('/bulkinserts', [BulkInsertEmployeesController::class, 'store'])->name('bulkinserts.store');
 
Route::get('bulkupdate',[BulkUpdateEmployeesController::class, 'index'])->name('bulkupdates.index');
Route::post('bulkupdate',[BulkUpdateEmployeesController::class, 'update'])->name('bulkupdates.update');


Route::get('employees/export/index',[EmployeeExportController::class,'index'])->name('employees.export.index');
Route::get('employees/export/pdf',[EmployeeExportController::class,'exportPdf'])->name('employees.export.pdf');
Route::get('employees/export/excel',[EmployeeExportController::class,'exportExcel'])->name('employees.export.excel');
Route::get('employees/export/csy',[EmployeeExportController::class,'exportCsv'])->name('employees.export.csv');
Route::get('employees/export/txt',[EmployeeExportController::class,'exportTxt'])->name('employees.export.txt');
Route::get('employees/export/wrod',[EmployeeExportController::class,'exportWord'])->name('employees.export.word');


Route::get('/temporary-employees',[TemporaryEmployeeController::class,'index'])->name('temporary-employees.index');
Route::get('/temporary-employees/create',[TemporaryEmployeeController::class,'create'])->name('temporary-employees.create');
Route::post ('/temporary-employees',[TemporaryEmployeeController::class,'store'])->name('temporary-employees.store');
Route::get ('/temporary-employees/{id}',[TemporaryEmployeeController::class,'show'])->name('temporary-employees.show');