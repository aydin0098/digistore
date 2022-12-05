<?php

namespace Database\Seeders;

use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            1 => [
                'id' => 1,
                'title' => 'manager',
                'description' => 'مدیر کل',

            ],
            2 => [
                'id' => 2,
                'title' => 'admin',
                'description' => 'مدیر فروشگاه',

            ],

        ];
        foreach ($roles as $role){
            $check = Role::where('title',$role['title'])->first();
            if (!$check){
                Role::create([
                    'title' => $role['title'] ,
                    'description' => $role['description']
                ]);

            }

        }


//        DB::table('role_user')->insert([
//            'user_id' => 1,
//            'role_id' => 1
//        ]);

    }
}
