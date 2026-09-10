<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'country_id', 'age', 'role_id', 'NOFA', 'is_locked'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
public function country(){
    return $this->belongsTo(Country::class);
}
public function role(){
    return $this->belongsTo(Roles::class,'role_id');
}
public function hasRole($roleName){
    return $this->role && $this->role->name === $roleName;
}


    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
