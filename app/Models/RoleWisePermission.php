<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class RoleWisePermission extends Model
{
    protected $fillable = ['role_id','permission_id'];

    public function permission(){
        return $this->belongsTo(Permission::class);
    }
    public function role(){
        return $this->belongsTo(Roles::class);
    }
}
