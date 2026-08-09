<?php

namespace App\Http\Controllers;

use App\Models\TempEmployee;
use Illuminate\Http\Request;
use App\Models\EmployeeCertificate;

class TemporaryEmployeeController extends Controller {

    public function index() {
        $employees = TempEmployee::all();
        return view( 'temporary_employees.index', compact( 'employees' ) );
    }

    public function create() {
        return view( 'temporary_employees.create' );
    }

    public function store( Request $request ) {

        $validated = $request->validate( [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'cv' => 'required|file|mimes:pdf,doc,docx',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
            'pan_card' => 'required|image|mimes:jpeg,png,jpg',
            'certificates.*' => 'file|mimes:pdf,jpeg,png,jpg',
        ] );

        // Store CV
        $cvPath = $request->file( 'cv' )->storeAs(
            'employee_files/cv',
            "{$validated['first_name']}.{$request->file('cv')->getClientOriginalExtension()}"
        );

        // Store Photo
        $photoPath = $request->file( 'photo' )->storeAs(
            'employee_files/photos',
            "{$validated['first_name']}.{$request->file('photo')->getClientOriginalExtension()}"
        );

        // Store PAN Card
        $panCardContent = file_get_contents( $request->file( 'pan_card' ) );

        // Save the employee data
        $employee = TempEmployee::create( [
            'first_name' => $validated[ 'first_name' ],
            'last_name' => $validated[ 'last_name' ],
            'cv' => $cvPath,
            'photo' => $photoPath,
            'pan_card' => $panCardContent,
        ] );

        // Store Certificates
        if ( $request->has( 'certificates' ) ) {
            foreach ( $request->certificates as $certificate ) {

                $certificateModel = EmployeeCertificate::create( [
                    'temp_emp_id' => $employee->id,
                    'certificate_name' => '', // Temp value to update later
                ] );

                $certificatePath = $certificate->storeAs(
                    "employee_files/certificates/{$employee->id}",
                    "{$employee->id}_{$employee->first_name}_{$certificateModel->id}.{$certificate->getClientOriginalExtension()}"
                );

                $certificateModel->update( [
                    'certificate_name' => $certificatePath,
                ] );

            }
        }

        return redirect()->route( 'temporary-employees.index' )->with( 'success', 'Added Successfully!!' );

    }

    public function show( $id ) {
        $employee = TempEmployee::with( 'certificates' )->findOrFail( $id );
        return view( 'temporary_employees.show', compact( 'employee' ) );
    }

}
