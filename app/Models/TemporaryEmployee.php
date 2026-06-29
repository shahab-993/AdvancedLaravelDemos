<?php

namespace App\Models;

use App\Listeners\TemporaryEmployeeEventListener;
use Illuminate\Database\Eloquent\Model;

class TemporaryEmployee extends Model
{
    protected $fillable = ['name','salary'];

    protected static function booted(){
        $listener = new TemporaryEmployeeEventListener();
        //Handle Creating event
        static::creating(function ($employee) use ($listener){
            $listener->handleCreating($employee);
        });

        static::created(function ($employee) use ($listener){
            $listener->handleCreated($employee);
        });
    }
}

