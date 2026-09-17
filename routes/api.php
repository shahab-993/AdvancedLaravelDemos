<?php

use App\Http\Controllers\api\CountriesAPIController;
use App\Http\Controllers\api\DepartmentsAPIController;
use App\Http\Controllers\api\EmployeesAPIController;
use Illuminate\Support\Facades\Route;
 
Route::prefix('employees')->group(function(){
    Route::get('/',[EmployeesAPIController::class,'index']);
    Route::get('/{id}',[EmployeesAPIController::class,'show']);
    Route::post('/store',[EmployeesAPIController::class,'store']);
    Route::put('/{id}',[EmployeesAPIController::class,'update']);
    Route::delete('/{id}',[EmployeesAPIController::class,'destroy']);
});
Route::get('/departments',[DepartmentsAPIController::class,'index']);
Route::get('/countries',[CountriesAPIController::class,'index']); 