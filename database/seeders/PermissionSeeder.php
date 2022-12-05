<?php

namespace Database\Seeders;

use App\Models\Admin\Permissions\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            1 => [
                'id' => 1,
                'title' => 'setting-footer-label',
                'description' => 'برچسب های فوتر',

            ],
            2 => [
                'id' => 2,
                'title' => 'setting-footer-social',
                'description' => 'شبکه های اجتماعی',

            ],
            3 => [
                'id' => 3,
                'title' => 'setting-footer-logo',
                'description' => 'لوگو های فوتر',

            ],
            4 => [
                'id' => 4,
                'title' => 'setting-footer-menu',
                'description' => 'منو های فوتر',

            ],
            5 => [
                'id' => 5,
                'title' => 'setting-footer-apps',
                'description' => 'نماد های فوتر سایت',

            ],
            6 => [
                'id' => 6,
                'title' => 'site-settings',
                'description' => 'تنظیمات سایت',

            ],
            7 => [
                'id' => 7,
                'title' => 'manage_roles',
                'description' => 'مدیریت نقش ها',

            ],
            8 => [
                'id' => 8,
                'title' => 'manage_permissions',
                'description' => 'مدیریت سطوح دسترسی',

            ],
            9 => [
                'id' => 9,
                'title' => 'manage_logs',
                'description' => 'گزارشات سیستمی',

            ],

        ];
        foreach ($permissions as $permission){
            $check = Permission::where('id',$permission['id'])->first();
            if (!$check){
                Permission::create([
                    'title' => $permission['title'] ,
                    'description' => $permission['description']
                ]);

                DB::table('permission_role')->insert([
                    'role_id' => 1,
                    'permission_id' => $permission['id']
                ]);
            }
        }
    }
}