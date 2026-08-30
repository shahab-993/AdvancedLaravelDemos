<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookiesDemoController extends Controller
{
    public function index(Request $request){
        Cookie::queue(Cookie::make('username','Ahmad', 20));
        Cookie::queue(Cookie::make('country','AFG', 20));
        Cookie::queue(Cookie::make('age','25', 20));
            $employee = [
        'id'=>1,
        'name' => 'Connors McGregor',
        'age'=> 35,
        'designation'=>'UFC',
        'skills' =>['php','Laravel', 'VueJs']
    ];
    $employeeJson = json_encode($employee);
    Cookie::queue(Cookie::make('employee',$employeeJson,20));
    Cookie::queue(Cookie::forget('age'));

    foreach($request->cookies as $key =>$value){
        Cookie::queue(Cookie::forget($key));

    }
    return view('cookiesdemo.index');

        


     }
     public function readcookiesdata(Request $request){
        $username= $request->cookie('username');
        $country=$request->cookie('country');
        $age=$request->cookie('age');

        $employeeJson =$request->cookie('employee');
        $employeeData = json_decode($employeeJson,true); 
        return view('cookiesdemo.readcookiesdata',compact('employeeData','username','country','age'));
     }

}
