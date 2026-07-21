<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class DeletSingleRowUsingRadioButtonController extends Controller
{
    public function index(Request $request){
        $employees=Employee::with(['department','country'])->get();
        return  view('deletesinglerow.index',compact('employees'));

    }
public function destroy(Request $request){
    $employee=Employee::find($request->employee_id);
    if($employee){
        $employee->delete();
        return redirect()->back()->with('success','Employee deleted successfully');
    }

}

}
