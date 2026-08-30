<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionsDemoController extends Controller
{
  public function index(){
    Session::put('username','Ahmad');
    Session::put('Country','Afg');
    Session::put('Age',25);

    $employee = [
        'id'=>1,
        'name' => 'Connors McGregor',
        'age'=> 35,
        'designation'=>'UFC',
        'skills' =>['php','Laravel', 'VueJs']
    ];
    Session::put('employee',$employee);
    Session::forget('employee');
    Session::flush();
    config(['session.lifetime'=>2]);
    return view('sessionsdemo.index');

  }
  public function readsessiondata(){
    return view('sessionsdemo.readsessiondata');

  }
}
