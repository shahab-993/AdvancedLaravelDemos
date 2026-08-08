<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeCertificate extends Model
{
     protected $fillables = [   
        'temp_em_id','certificate_name'
     ];


     public function employee(): BelongsTo{
        return $this->belongsTo(TempEmployee::class, 'temp_emp_id'); 
     }
}
