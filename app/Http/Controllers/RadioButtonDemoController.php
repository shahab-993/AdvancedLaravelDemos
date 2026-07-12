<?php

namespace App\Http\Controllers;

use App\Models\AllowanceTypes;
use Illuminate\Http\Request;

class RadioButtonDemoController extends Controller
{
    public function create(){
<<<<<<< HEAD
        $allowanceTypes=AllowanceTypes::all();
        return view('radiobuttonsdemo.create',compact('allowanceTypes'));

    }
    public function store(Request $request){

    }
}
=======
       $allowanceTypes= AllowanceTypes::all();
       return view("radiobuttondemo.create",compact("allowanceTypes"));

    }
    public function store(Request $request){    
}
}
>>>>>>> 4ec4d6b69613d303654bd0f52b8e24252106623d
