<?php

namespace App\Http\Controllers;

use App\Models\AllowanceTypes;
use Illuminate\Http\Request;

class RadioButtonDemoController extends Controller
{
    public function create(){

        $allowanceTypes=AllowanceTypes::all();
        return view('radiobuttondemo.create',compact('allowanceTypes'));

    }
    public function store(Request $request){

    } 
}
