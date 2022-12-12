<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            1 => [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'mobile' => '09398933139',
                'password' => Hash::make('123456789'),
                'typeUser' => 'admin',
                'profilePhoto' => asset('/home/assets/images/svg/user-profile.svg')
            ],
        ];

        foreach ($users as $user){
            $check = User::where('email',$user['email'])->first();
            if (!$check){
               User::create([
                   'name' => $user['name'],
                   'email' => $user['email'],
                   'mobile' => $user['mobile'],
                   'password' => $user['password'],
                   'profilePhoto' => $user['profilePhoto']
               ]);
            }
        }
    }
}
