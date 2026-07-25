<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class DeleteBulkRowsUsingCheckBoxController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::with(['department', 'country'])->get();
        return view('deletebulkrows.index',compact('employees'));

    }
    
    public function destroy(Request $request)
	{

         $employeeIds = $request->employee_ids;

         if ($employeeIds && count($employeeIds) > 0) {
            Employee::whereIn('id', $employeeIds)->delete();
            return redirect()->back()->with('success', 'Selected employees deleted successfully');
        }



	}

}
