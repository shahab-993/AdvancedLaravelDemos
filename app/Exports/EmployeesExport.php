<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::with(['department', 'country'])->get()->map(function ($employee) {
            return [
                    'first_name'=> $employee->first_name,
                    'last_name'=>$employee->last_name,
                    'title_name'=>$employee->title_name,
                    'email'=> $employee->email,
                    'department'=>$employee->department->name ?? 'N/A',
                    'country' => $employee->country->name ?? 'N/A',
                    'notes'=>$employee->notes,

            ];
        });

    }
    public function headings():array {
        return [
            'First Name',
            'Last Name',
            'Title Name',
            'Email',
            'Department',
            'Country',
            'Notes',
        ];
    }
}
