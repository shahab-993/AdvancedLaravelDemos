<?php

namespace Database\Seeders;

use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     DB::table('permissions')->insert([
        ['name'=>'Create', 'created_at'=>Carbon::now()],
        ['name'=>'Update', 'created_at'=>Carbon::now()],
        ['name'=>'Delete', 'created_at'=>Carbon::now()],
        ['name'=>'Select', 'created_at'=>Carbon::now()],
        ['name'=>'View', 'created_at'=>Carbon::now()],
     ]);
    }
}
