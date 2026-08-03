<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class BulkUpdateEmployeesController extends Controller {

    public function index() {
        $countries = Country::all();
        $employees = Employee::all();
        $departments = Department::all();
        return view( 'bulkupdate.index', compact( 'employees', 'countries', 'departments' ) );

    }

    // public function update( Request $request ) {

    //     $employees = $request->input( 'employees' );

    //     foreach ( $employees as $employeeData ) {
    //         Employee::where( 'id', $employeeData[ 'id' ] )->update( [
    //             'first_name' => $employeeData[ 'first_name' ],
    //             'last_name' => $employeeData[ 'last_name' ],
    //             'title_name' => $employeeData[ 'title_name' ],
    //             'has_passport' => $employeeData[ 'has_passport' ] ?? 0,
    //             'salary' => $employeeData[ 'salary' ],
    //             'email' => $employeeData[ 'email' ],
    //             'phone_number' => $employeeData[ 'phone_number' ],
    //             'department_id' => $employeeData[ 'department_id' ],
    //             'country_id' => $employeeData[ 'country_id' ],
    //         ] );
    //     }
    //     return redirect()->back()->with( 'success', 'Employees updated successfully!' );

    // }
    public function update(Request $request)
{
    $employees = $request->employees;

    foreach ($employees as $id => $employeeData) {

        Employee::where('id', $id)->update([
            'first_name'    => $employeeData['first_name'],
            'last_name'     => $employeeData['last_name'],
            'title_name'    => $employeeData['title_name'],
            'has_passport'  => $employeeData['has_passport'] ?? 0,
            'salary'        => $employeeData['salary'],
            'email'         => $employeeData['email'],
            'phone_number'  => $employeeData['phone_number'],
            'department_id' => $employeeData['department_id'],
            'country_id'    => $employeeData['country_id'],
        ]);
    }

    return redirect()->back()->with('success', 'Employees updated successfully!');
}
}
