<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Department::insert([
        [   'name'=>'HR',
        'location'=>'Afghanistan'
        ],
        [
            'name'=>'Finance',
            'location'=>'Afghanistan'
        ],
          [
            'name'=>'Networking',
            'location'=>'Afghanistan'
        ],  
        [
            'name'=>'Sales',
            'location'=>'Afghanistan'
        ],
        [
            'name'=>'Dispatch',
            'location'=>'Afghanistan'
        ]
     
       ]);

    }
}
