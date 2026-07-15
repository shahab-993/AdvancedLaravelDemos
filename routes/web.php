<?php

use App\Http\Controllers\CheckBoxDemoController;
use App\Http\Controllers\EmployeeControler;
use App\Http\Controllers\EmployeeFiltersController;
use App\Http\Controllers\ListBoxDemoController;
use App\Http\Controllers\QueryBuilderDemoController;
use App\Http\Controllers\RadioButtonDemoController;
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