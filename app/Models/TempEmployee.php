<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TempEmployee extends Model
{
    protected $fillables = [    
        "first_name","last_name","cv","photo","pen_card"
    ];


    public function certificates():HasMany{
        return $this->hasMany(EmployeeCertificate::class,'temp_emp_id');
    }
}
