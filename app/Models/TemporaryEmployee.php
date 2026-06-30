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
        static::deleting(function ($employee) use ($listener){
            $listener->handleDeleting($employee);
        });
        static::deleted(function ($employee) use ($listener){
            $listener->handleCreated($employee);
        });
        static::updating(function ($employee) use ($listener){
            $listener->handleUpdating($employee);
        });
        static::updated(function ($employee) use ($listener){
            $listener->handleUpdated($employee);
        });
    }
}

