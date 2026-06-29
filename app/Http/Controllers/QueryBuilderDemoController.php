<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class QueryBuilderDemoController extends Controller

{
       public function index( Request $request ) {
        // $query = Employee::with( [ 'department', 'country' ] );  
        $query= DB::table('employees')
        ->join('departments','employees.department_id','=', 'departments.id')
        ->join('countries','employees.country_id','=', 'countries.id')
        ->select('employees.*','departments.name as departmentname','countries.name as countryname'); 


        $employees = collect( [] );
        $employees = $query->get();

        if ( $request->filled( 'search' ) ) {
            $search = $request->input( 'search' );
            $employees = $query->where( 'first_name', 'like', "%$search%" )->get();
            //$employees = $query->where( 'first_name', 'not like', "%$search%" )->get();

            //$employees = $query->where( 'email', '=', $search )->get();
            //$employees = $query->whereNot( 'email', '=', $search )->get();

            //$employees = $query->where( 'salary', '>', $search )->get();
            //$employees = $query->where( 'salary', '<', $search )->get();
            // $employees = $query->where( 'salary', '>=', $search )->get();
            // $employees = $query->where( 'salary', '<=', $search )->get();

            //$employees = $query->whereBetween( 'salary', [ $search, 67000 ] )->get();
            //$employees = $query->whereNotBetween( 'salary', [ $search, 67000 ] )->get();

            //$employees = $query->where( 'email', '=', $search )
            //->orWhere( 'department_id', '=', 5 )->get();

            //$employees = $query->where( 'first_name', '=', 'Alex' )
            // ->where( 'department_id', '=', 4 )->get();

        }

        // if ( $request->filled( 'country_id' ) ) {
        //     $employees = $query->where( 'country_id', $request->input( 'country_id' ) )->get();
        // }

        //if ( $request->filled( 'department_ids' ) ) {
        //$employees = $query->whereIn( 'department_id', $request->input( 'department_ids' ) )->get();
        //$employees = $query->whereNotIn( 'department_id', $request->input( 'department_ids' ) )->get();
        //}

        // if ( $request->filled( 'start_date' ) ) {

        //     $startdate = $request->input( 'start_date' );
        //     $enddate = $request->input( 'end_date' );
        //     $employees = $query->whereBetween( 'hire_date', [ $startdate, $enddate ] )->get();
        // }

        //$employees = $query->whereNull( 'phone_number' )->get();
        //$employees = $query->whereNotNull( 'phone_number' )->get();

        //$employees = $query->orderBy( 'department_id', 'desc' )->get();

        //$employees = $query->orderBy( 'department_id', 'desc' )
        //->orderBy( 'country_id', 'asc' )->get();

        // $countries = Country::all();
        // $departments = Department::all();
        $countries=DB::table('countries')->get();
        $departments=DB::table('departments')->get();

        return view( 'employeefilters.index', compact( 'employees', 'countries', 'departments' ) );

    }

    public function queryfilter( Request $request ) {

        $results = null;

        // Find employee by ID
        // $results = Employee::find( 12 );

        // $results = Employee::find( [ 1, 12 ] );

        // $results = Employee::take( 1 )->get();

        // $results = Employee::take( 3 )->get();

        //$results = Employee::first();

        // $results = Employee::orderBy( 'first_name' )->first();

        // $results = Employee::latest()->first();

        // $results = Employee::orderBy( 'first_name', 'desc' )->first();

        // $results = Employee::where( 'first_name', 'sara' )->first();

        // $results = Employee::where( 'id', '>', 10 )->orderByDesc( 'sa lary' )->get();

        $results = Employee::join( 'departments', 'employees.department_id', '=', 'departments.id' )->get();

        if ( $results ) {
            return view( 'employeefilters.queryfilter', compact( 'results' ) );
        } else {
            return 'Employee Not Found.';
        }

    }
}
