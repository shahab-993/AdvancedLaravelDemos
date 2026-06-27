<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $fillable = [
    'first_name',
    'last_name',
    'title_name',
    'has_passport',
    'salary',
    'birth_date',
    'hire_date',
    'notes',
    'email',
    'phone_number',
    'department_id',
    'country_id'


  ];   
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }

}
