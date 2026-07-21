<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CountryList;
use App\Models\State;
use Illuminate\Http\Request;

class CascadingDropDownListsDemoController extends Controller
{
   public function getCountries(){
    $countries =CountryList::all();
    return view('cascadingdropdownlistdemo.getcountries',compact('countries'));
   }
   public function getState($country_id){
      $states= State::where('country_id', $country_id)->get();
      return response()->json($states);
   }
   public function getCities($state_id){
    $cities= City::where('state_id', $state_id)->get();

   return response()->json($cities);
   }
}
