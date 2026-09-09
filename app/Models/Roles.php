<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['name'];
    
    public function permissions(){
        return $this->hasMany(RoleWisePermission::class);
    }
}
