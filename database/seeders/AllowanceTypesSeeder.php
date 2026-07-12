<?php

namespace Database\Seeders;


use App\Models\AllowanceTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AllowanceTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

           AllowanceTypes::insert([
            ['AllowanceTypeName' => 'HRA', 'AllowancePercentage' => 10],
            ['AllowanceTypeName' => 'MA', 'AllowancePercentage' => 20],
            ['AllowanceTypeName' => 'CA', 'AllowancePercentage' => 30],
            ['AllowanceTypeName' => 'DA', 'AllowancePercentage' => 40],
        ]);

}
}
