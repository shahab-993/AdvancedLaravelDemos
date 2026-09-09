<?php

namespace Database\Seeders;

use App\Models\Roles;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Roles::insert([
        [
            'name'=>'superuser',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],
        [
            'name'=>'cutomer',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],
       ]) ;
    }
}
