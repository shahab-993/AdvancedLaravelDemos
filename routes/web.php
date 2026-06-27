<?php

use App\Http\Controllers\EmployeeControler;
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