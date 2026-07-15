<?php

namespace App\Http\Controllers;

use App\Models\AllowanceTypes;
use Illuminate\Http\Request;

class CheckBoxDemoController extends Controller
{
    public function create(){
        $allowanceTypes=AllowanceTypes::all();
        return view("checkboxdemo.create",compact("allowanceTypes"));

    }
    public function store(Request $request){    

    }
}
