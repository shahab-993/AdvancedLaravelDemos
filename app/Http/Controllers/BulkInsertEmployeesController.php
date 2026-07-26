<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Department;
use Illuminate\Http\Request;

class BulkInsertEmployeesController extends Controller
{
    public function create(){
        $departments =Department::all();
        $counrties= Country::all();
        return view('bulkinsert.create',compact('departments','counrties'));

    }
    public function store(Request $request){

    }
}
