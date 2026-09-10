<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(User::where('id', '1')->doesntExist()){
            User::create([
                'name' =>'Superuser',
                'email'=>'super@user.com',
                'password'=>Hash::make('12345678'),
                'role_id'=>1,
                'NOFA'=>0,
                'is_locked'=>0,
                'country_id'=>1,
                'age'=>25,
                'email_verified_at'=>Carbon::now(),

            ]);
            echo 'Superuser has been added';

        }else{
            echo 'Superuser already exists.';
        }
    }
}
