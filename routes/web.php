<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CacheDemoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\CookiesDemoController;
use App\Http\Controllers\ListBoxDemoController;
use App\Http\Controllers\CheckBoxDemoController;
use App\Http\Controllers\SessionsDemoController;
use App\Http\Controllers\EmployeeDIDemoController;
use App\Http\Controllers\EmployeeExportController;
use App\Http\Controllers\EmployeeFiltersController;
use App\Http\Controllers\ValidationsDemoController;
use App\Http\Controllers\QueryBuilderDemoController;
use App\Http\Controllers\RadioButtonsDemoController;
use App\Http\Controllers\TemporaryEmployeeController;
use App\Http\Controllers\BulkInsertEmployeesController;
use App\Http\Controllers\BulkUpdateEmployeesController;
use App\Http\Controllers\EmployeeWithPermissionController;
use App\Http\Controllers\CascadingDropDownListsDemoController;
use App\Http\Controllers\DeleteBulkRowsUsingCheckBoxController;
use App\Http\Controllers\DeleteSingleRowUsingRadioButtonController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/laraveladvancedtopics', function () {
    return view('laraveladvancedtopics');
});


Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index'); 

Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create'); 

Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');



Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit'); 

Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update'); 

Route::delete('/employees/delete/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy'); 

Route::get('/pagewiseemployees', [EmployeeController::class, 'pageWiseEmployees'])->name('employees.pagewiseemployees'); 

Route::post('/search', [EmployeeController::class, 'search'])->name('employees.search'); 

Route::get('/workwithradiobuttons', [RadioButtonsDemoController::class, 'create'])->name('workwithradiobuttons.create');
Route::post('/workwithradiobuttons', [RadioButtonsDemoController::class, 'store'])->name('workwithradiobuttons.store');

Route::get('/workwithcheckboxes', [CheckBoxDemoController::class, 'create'])->name('workwithcheckboxes.create');
Route::post('/workwithcheckboxes', [CheckBoxDemoController::class, 'store'])->name('workwithcheckboxes.store');

Route::get('/listboxdemo', [ListBoxDemoController::class, 'create'])->name('listboxdemo.create');
Route::post('/listboxdemo', [ListBoxDemoController::class, 'store'])->name('listboxdemo.store');

Route::get('/cascadingdropdowndemo', [CascadingDropDownListsDemoController::class, 'getCountries'])->name('cascadingdropdowndemo');
Route::get('/get-states/{country_id}', [CascadingDropDownListsDemoController::class, 'getStates'])->name('get-states');
Route::get('/get-cities/{state_id}', [CascadingDropDownListsDemoController::class, 'getCities'])->name('get-cities');

Route::get('/single-delete', [DeleteSingleRowUsingRadioButtonController::class, 'index'])->name('singleDelete');
Route::delete('/employees-delete', [DeleteSingleRowUsingRadioButtonController::class, 'destroy'])->name('employees.delete');

Route::get('/bulk-delete', [DeleteBulkRowsUsingCheckBoxController::class, 'index'])->name('bulkemployees.index');
Route::delete('/employees/bulk-delete', [DeleteBulkRowsUsingCheckBoxController::class, 'destroy'])->name('employees.bulkDelete');






Route::get('employees/export/index', [EmployeeExportController::class, 'index'])->name('employees.export.index');
Route::get('employees/export/pdf', [EmployeeExportController::class, 'exportPdf'])->name('employees.export.pdf');
Route::get('employees/export/excel', [EmployeeExportController::class, 'exportExcel'])->name('employees.export.excel');
Route::get('employees/export/csv', [EmployeeExportController::class, 'exportCsv'])->name('employees.export.csv');
Route::get('employees/export/txt', [EmployeeExportController::class, 'exportTxt'])->name('employees.export.txt');
Route::get('employees/export/word', [EmployeeExportController::class, 'exportWord'])->name('employees.export.word');



Route::get('sessionsdemo', [SessionsDemoController::class, 'index'])->name('sessionsdemo.index');
Route::get('readsessiondata', [SessionsDemoController::class, 'readsessiondata'])->name('sessionsdemo.readsessiondata');

Route::get('cookiesdemo', [CookiesDemoController::class, 'index'])->name('cookiesdemo.index');
Route::get('readcookiesdata', [CookiesDemoController::class, 'readcookiesdata'])->name('cookiesdemo.readcookiesdata');

Route::get('cachedemo', [CacheDemoController::class, 'index'])->name('cachedemo.index');




Route::get('employeefilters', [EmployeeFiltersController::class, 'index'])->name('employeefilters.index');
Route::get('employeequeryfilters', [EmployeeFiltersController::class, 'queryfilter'])->name('employeefilters.queryfilter');

Route::get('employeequerybuilder', [QueryBuilderDemoController::class, 'index'])->name('employeeQB.index');
Route::get('employeeQBfilters', [QueryBuilderDemoController::class, 'queryfilter'])->name('employeeQB.queryfilter');

Route::get('/employeesDI', [EmployeeDIDemoController::class, 'index'])->name('employeesDI.index'); 

Route::get('/employeesDI/create', [EmployeeDIDemoController::class, 'create'])->name('employeesDI.create'); 
Route::post('/employeesDI', [EmployeeDIDemoController::class, 'store'])->name('employeesDI.store');     


Route::get('/employeesDI/{id}', [EmployeeDIDemoController::class, 'show'])->name('employeesDI.show');      
Route::delete('/employeesDI/delete/{id}', [EmployeeDIDemoController::class, 'destroy'])->name('employeesDI.destroy'); 

Route::get('/employeesDI/{id}/edit', [EmployeeDIDemoController::class, 'edit'])->name('employeesDI.edit'); 
Route::put('/employeesDI/{id}', [EmployeeDIDemoController::class, 'update'])->name('employeesDI.update'); 

Route::get('/bulkinserts', [BulkInsertEmployeesController::class, 'create'])->name('bulkinserts.create');
Route::post('/bulkinserts', [BulkInsertEmployeesController::class, 'store'])->name('bulkinserts.store');

Route::get('/bulkupdates', [BulkUpdateEmployeesController::class, 'index'])->name('bulkupdates.index');
Route::post('/bulkupdates', [BulkUpdateEmployeesController::class, 'update'])->name('bulkupdates.update');


Route::get('/validationsdemo', [ValidationsDemoController::class, 'create'])->name('validationsdemo.create');
Route::post('/validationsdemo', [ValidationsDemoController::class, 'store'])->name('validationsdemo.store');




Route::get('/temporary-employees', [TemporaryEmployeeController::class, 'index'])->name('temporary-employees.index');
Route::get('/temporary-employees/create', [TemporaryEmployeeController::class, 'create'])->name('temporary-employees.create');
Route::post('/temporary-employees', [TemporaryEmployeeController::class, 'store'])->name('temporary-employees.store');
Route::get('/temporary-employees/{id}', [TemporaryEmployeeController::class, 'show'])->name('temporary-employees.show');




Route::get('/home', function () {
    return view('customer.home', ['user' => auth()->user()]);
})->middleware(['auth'])->name('home');

Route::get('/adminhome', function () {
    return view('admin.home', ['user' => auth()->user()]);
})->middleware(['auth'])->name('adminhome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','IsSuperuser'])->prefix('admin')->name('admin.')->group(function () {

     // User routes
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users/toggle-block/{id}', [UserController::class, 'toggleBlock'])->name('users.toggleBlock');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show'); 

    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); 
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update'); 
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); 

    Route::resource('roles', RolesController::class);

    Route::get('/roles/{roleId}/permissions', [RolesController::class, 'role_permission_show'])->name('roles.permissions');
    Route::post('/roles/{roleId}/permissions', [RolesController::class, 'role_permission_update']);


});


Route::middleware(['auth'])->group(function () {
    Route::get('/employees-with-permissions', 
    [EmployeeWithPermissionController::class, 'index'])
        ->name('employeesWithPermissions.index')
        ->middleware('check.permission:Select');

    Route::get('/employees-with-permissions/{id}/show', 
    [EmployeeWithPermissionController::class, 'show'])
        ->name('employeesWithPermissions.show')
        ->middleware('check.permission:View');  

    Route::get('/employees-with-permissions/{id}/edit', 
    [EmployeeWithPermissionController::class, 'edit'])
        ->name('employeesWithPermissions.edit')
        ->middleware('check.permission:Update');  

    Route::put('/employees-with-permissions/{id}', 
    [EmployeeWithPermissionController::class, 'update'])
        ->name('employeesWithPermissions.update')
        ->middleware('check.permission:Update');  

      Route::delete('/employees-with-permissions/{id}/destroy', 
      [EmployeeWithPermissionController::class, 'destroy'])
        ->name('employeesWithPermissions.destroy')
        ->middleware('check.permission:Delete');  

      Route::get('/employees-with-permissions/create', 
      [EmployeeWithPermissionController::class, 'create'])
        ->name('employeesWithPermissions.create')
        ->middleware('check.permission:Create');  

    Route::post('/employees-with-permissions', 
    [EmployeeWithPermissionController::class, 'store'])
        ->name('employeesWithPermissions.store')
        ->middleware('check.permission:Create');  


});






require __DIR__.'/auth.php';
