<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountriesAPIController extends Controller
{
   public function index(){
    $countries = Country::all();
    return response()->json($countries);

   }
}
