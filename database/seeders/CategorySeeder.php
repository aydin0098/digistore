<?php

namespace Database\Seeders;

use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Products\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            1 => [
                'id' => 1,
                'title' => 'کالای دیجیتال',
                'parent_id' => null,
                'level' => 1,
                'description' => 'کالای دیجیتال',
                'image' => null,
                'icon' => 'mdi mdi-monitor',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,

            ],
            2 => [
                'id' => 2,
                'title' => 'آرایشی بهداشتی و سلامت',
                'parent_id' => null,
                'level' => 1,
                'description' => 'آرایشی بهداشتی و سلامت',
                'image' => null,
                'icon' => 'mdi mdi-diamond-outline',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,

            ],
            3 => [
                'id' => 3,
                'title' => 'خودرو ، ابزار و اداری',
                'parent_id' => null,
                'level' => 1,
                'description' => 'خودرو ، ابزار و اداری',
                'image' => null,
                'icon' => 'mdi mdi-wrench',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,

            ],
            4 => [
                'id' => 4,
                'title' => 'مد و پوشاک',
                'parent_id' => null,
                'level' => 1,
                'description' => 'مد و پوشاک',
                'image' => null,
                'icon' => 'mdi mdi-tshirt-v-outline',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,

            ],
            5 => [
                'id' => 5,
                'title' => 'خانه و اشپزخانه',
                'parent_id' => null,
                'level' => 1,
                'description' => 'خانه و اشپزخانه',
                'image' => null,
                'icon' => 'mdi mdi-sofa',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,

            ],
            6 => [
                'id' => 6,
                'title' => 'کتاب ، لوازم تحریر',
                'parent_id' => null,
                'level' => 1,
                'description' => 'کتاب ، لوازم تحریر',
                'image' => null,
                'icon' => 'mdi mdi-book-open-page-variant',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,

            ],
            7 => [
                'id' => 7,
                'title' => 'اسباب بازی کودک و نوزاد',
                'parent_id' => null,
                'level' => 1,
                'description' => 'اسباب بازی کودک و نوزاد',
                'image' => null,
                'icon' => 'mdi mdi-baby',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,

            ],
            8 => [
                'id' => 8,
                'title' => 'لوازم جانبی گوشی',
                'parent_id' => 1,
                'level' => 2,
                'description' => 'لوازم جانبی گوشی',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,
                'image' => null,
                'icon' =>null,

            ],
            9 => [
                'id' => 9,
                'title' => 'گوشی موبایل',
                'parent_id' => 1,
                'level' => 2,
                'description' => 'گوشی موبایل',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,'image' => null,
                'icon' =>null,


            ],

            10 => [
                'id' => 10,
                'title' => 'واقعیت مجازی',
                'parent_id' => 1,
                'level' => 2,
                'description' => 'واقعیت مجازی',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,
                'image' => null,
                'icon' =>null,

            ],

            11 => [
                'id' => 11,
                'title' => 'کیف و کاور گوشی',
                'parent_id' => 8,
                'level' => 3,
                'description' => 'کیف و کاور گوشی',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,
                'image' => null,
                'icon' =>null,

            ],
            12 => [
                'id' => 12,
                'title' => 'پاور بانک',
                'parent_id' => 8,
                'level' => 3,
                'description' => 'پاور بانک',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,
                'image' => null,
                'icon' =>null,

            ],
            13 => [
                'id' => 13,
                'title' => 'سامسونگ',
                'parent_id' => 9,
                'level' => 3,
                'description' => 'سامسونگ',
                'metaTitle' => null,
                'metaDescription' => null,
                'isActive' => 1,
                'image' => null,
                'icon' =>null,

            ],
            14 => [
                'id' => 14,
                'title' => 'اپل',
                'parent_id' => 9,
                'level' => 3,
                'description' => 'اپل',
                'metaTitle' => null,
                'image' => null,
                'icon' =>null,
                'metaDescription' => null,
                'isActive' => 1,

            ],




        ];
        foreach ($categories as $cat) {
            $check = Category::where('title', $cat['title'])->first();
            if (!$check) {
                Category::create([
                    'title' => $cat['title'],
                    'slug' => str_replace(' ','-',$cat['title']),
                    'parent_id' => $cat['parent_id'],
                    'level' => $cat['level'],
                    'description' => $cat['description'],
                    'image' => $cat['image'],
                    'icon' => $cat['icon'],
                    'metaTitle' => $cat['metaTitle'],
                    'metaDescription' => $cat['metaDescription'],
                    'isActive' => $cat['isActive'],
                ]);


            }
        }

    }
}
