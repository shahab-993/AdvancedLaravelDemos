<?php

namespace App\Listeners;

use App\Models\TemporaryEmployeeBackup;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TemporaryEmployeeEventListener
{
    public function handleCreating($employee)
    {
        $dayOfWeek = Carbon::now()->format('l');
        if (in_array($dayOfWeek, ['Saturday', 'Sunday'])) {
            throw new \Exception("Data cannot be inserted on weekends ($dayOfWeek).");
        }
    }

    public function handleCreated($employee)
    {
        TemporaryEmployeeBackup::create($employee->toArray());
    }


    public function handleDeleting($employee)
    {
        $hour = Carbon::now('Asia/Kabul')->format('H');
        if ($hour >= 18 && $hour < 19) {
            throw new \Exception('Records cannot be deleted during restricted hours (6 PM to 7 Pm');
        }
        echo "employee {$employee} is about be deleted.\n";
    }
    public function handleDeleted($employee)
    {
        TemporaryEmployeeBackup::create($employee->toArray());
        echo "Employee {$employee->name} has been deleted successfully.\n";
        echo "Employee {$employee->name} has been inserted into  TemporaryEmployeeBackUp table  successfully.\n";
    }

    public function handleUpdating($employee) {
        $originalData= $employee->getOriginal();
        if(isset($employee->salary) && $employee-> salary !== $originalData['salary']){
            $salaryIncrement = $employee->salary - $originalData['salary'];
            if($salaryIncrement < 1000){
                throw new \Exception('Incremet must be at least 1000 and above!');
            }
        } 
    }

    public function handleUpdated($employee) {
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
