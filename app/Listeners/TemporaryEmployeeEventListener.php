<?php

namespace App\Listeners;

use App\Models\TemporaryEmployeeBackup;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TemporaryEmployeeEventListener
{
    public function handleCreating($employee){
        $dayOfWeek =Carbon::now()->format('l'); 
        if(in_array($dayOfWeek,['Saturday','Sunday'])){
            throw new \Exception("Data cannot be inserted on weekends ($dayOfWeek).");
        }

    }
    
    public function handleCreated($employee){
         TemporaryEmployeeBackup::create($employee->toArray());
    }




    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }
}
