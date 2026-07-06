<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeesAllowances extends Model
{
    protected $fillable = ['employee_id','allowance_type_id'];
}
