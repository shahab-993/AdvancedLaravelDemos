<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Models\AllowanceTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
=======
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AllowanceTypes;
>>>>>>> 4ec4d6b69613d303654bd0f52b8e24252106623d

class AllowanceTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
           AllowanceTypes::insert([
            ['AllowanceTypeName' => 'HRA', 'AllowancePercentage' => 10],
            ['AllowanceTypeName' => 'MA', 'AllowancePercentage' => 20],
            ['AllowanceTypeName' => 'CA', 'AllowancePercentage' => 30],
            ['AllowanceTypeName' => 'DA', 'AllowancePercentage' => 40],
        ]);
=======
             AllowanceTypes::insert([
           ['AllowanceTypeName'=> 'HRA','AllowancePercentage'=> '10'],
           ['AllowanceTypeName'=> 'MA','AllowancePercentage'=> '20'],
           ['AllowanceTypeName'=> 'CA','AllowancePercentage'=> '30'],
           ['AllowanceTypeName'=> 'DA','AllowancePercentage'=> '40'],
           
       ]);
>>>>>>> 4ec4d6b69613d303654bd0f52b8e24252106623d
    }
}
