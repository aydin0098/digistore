<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $footers = [
            1 => [
                'id' => 1,
                'upLabel' => 'برگشت به بالا',
                'widgetLabel1' => 'فوتر اول',
                'widgetLabel2' => 'فوتر دوم',
                'widgetLabel3' => 'فوتر سوم',
                'widgetLabel4' => 'فوتر چهارم',
                'widgetLabel5' => 'فوتر پنجم',
                'rssLabel' => 'از تخفیف‌ها و جدیدترین‌های دیجی‌استور باخبر شوید',
                'socialLabel' => 'دیجی‌استور را در شبکه‌های اجتماعی دنبال کنید',
                'supportLabel' => 'هفت روز هفته ، ۲۴ ساعت شبانه‌روز پاسخگوی شما هستیم',
                'phoneLabel' => 'شماره تماس',
                'emailLabel' => 'آدرس ایمیل',
                'aboutHeadLabel' => 'فروشگاه اینترنتی دیجی‌استور بررسی، انتخاب و خرید آنلاین',
                'aboutbodyLabel' => 'دیجی‌استور به عنوان یکی از قدیمی‌ترین فروشگاه های اینترنتی با بیش از یک دهه تجربه، با پایبندی به سه اصل، پرداخت در محل، 7 روز ضمانت بازگشت کالا و تضمین اصل‌بودن کالا موفق شده تا همگام با فروشگاه‌های معتبر جهان، به بزرگ‌ترین فروشگاه اینترنتی ایران تبدیل شود. به محض ورود به سایت دیجی‌استور با دنیایی از کالا رو به رو می‌شوید! هر آنچه که نیاز دارید و به ذهن شما خطور می‌کند در اینجا پیدا خواهید کرد.',
                'copyright' => 'استفاده از مطالب فروشگاه اینترنتی دیجی‌استور فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است. کلیه حقوق این سایت متعلق به شرکت نوآوران فن آوازه (فروشگاه آنلاین دیجی‌استور) می‌باشد.',
                'email' => 'aydin.s.hagighy@gmail.com',
                'phone' => '09398933139',
                'socialIcon1' => 'fa-instagram',
                'socialLink1' => '#',
                'socialIcon2' => 'fa-twitter',
                'socialLink2' => '#',
                'socialIcon3' => 'fa-facebook',
                'socialLink3' => '#',
                'socialIcon4' => 'fa-linkedin-square',
                'socialLink4' => '#',
                'socialIcon5' => '',
                'socialLink5' => '#',
                'socialIcon6' => '',
                'socialLink6' => '#',
                'socialIcon7' => '',
                'socialLink7' => '#',
                'socialIcon8' => '',
                'socialLink8' => '#',
                'socialIcon9' => '',
                'enamad' => '',
                'linkApp1' => '#',
                'imageApp1' => '/home/images/footer-img/android.png',
                'linkApp2' => '#',
                'imageApp2' => '/home/images/footer-img/ios.png',
            ],
        ];
        foreach ($footers as $footer){
            $check = DB::connection('mysql_settings')->table('footers')->first();
            if (!$check){
                DB::connection('mysql_settings')->table('footers')->insert([

                    'upLabel' => $footer['upLabel'] ,
                    'widgetLabel1' => $footer['widgetLabel1'] ,
                    'widgetLabel2' => $footer['widgetLabel2'] ,
                    'widgetLabel3' => $footer['widgetLabel3'],
                    'widgetLabel4' => $footer['widgetLabel4'] ,
                    'widgetLabel5' => $footer['widgetLabel5'] ,
                    'rssLabel' =>     $footer['rssLabel'] ,
                    'socialLabel' =>  $footer['socialLabel'] ,
                    'supportLabel' => $footer['supportLabel'] ,
                    'phoneLabel' =>   $footer['phoneLabel'] ,
                    'emailLabel' =>   $footer['emailLabel'],
                    'aboutHeadLabel' => $footer['aboutHeadLabel'] ,
                    'aboutbodyLabel' => $footer['aboutbodyLabel'] ,
                    'copyright' => $footer['copyright'] ,
                    'email' => $footer['email'] ,
                    'phone' => $footer['phone'] ,
                    'socialIcon1' => $footer['socialIcon1'] ,
                    'socialLink1' => $footer['socialLink1'] ,
                    'socialIcon2' => $footer['socialIcon2'] ,
                    'socialLink2' => $footer['socialLink2'] ,
                    'socialIcon3' => $footer['socialIcon3'] ,
                    'socialLink3' => $footer['socialLink3'] ,
                    'socialIcon4' => $footer['socialIcon4'] ,
                    'socialLink4' => $footer['socialLink4'] ,
                    'socialIcon5' => $footer['socialIcon5'] ,
                    'socialLink5' => $footer['socialLink5'] ,
                    'socialIcon6' => $footer['socialIcon6'] ,
                    'socialLink6' => $footer['socialLink6'] ,
                    'socialIcon7' => $footer['socialIcon7'] ,
                    'socialLink7' => $footer['socialLink7'] ,
                    'socialIcon8' => $footer['socialIcon8'] ,
                    'socialLink8' => $footer['socialLink8'] ,
                    'socialIcon9' => $footer['socialIcon9'] ,
                    'enamad' => $footer['enamad'] ,
                    'linkApp1' => $footer['linkApp1'] ,
                    'imageApp1' => $footer['imageApp1'] ,
                    'linkApp2' => $footer['linkApp2'] ,
                    'imageApp2' => $footer['imageApp2'] ,
                ]);
            }

        }

        //Logos
        $logos = [
            1 => [
                'id' => 1,
                'title'=> 'تحویل اکسپرس',
                'url' => '#',
                'image'=> '/home/assets/images/footer-svg/1.svg',
                'type'=> 'top',
                'status'=> 1,

            ],
            2 => [
                'id' => 2,
                'title'=> 'پشتیبانی 24 ساعته',
                'url' => '#',
                'image'=> '/home/assets/images/footer-svg/2.svg',
                'type'=> 'top',
                'status'=> 1,

            ],
            3 => [
                'id' => 3,
                'title'=> 'پرداخت در منزل',
                'url' => '#',
                'image'=> '/home/assets/images/footer-svg/3.svg',
                'type'=> 'top',
                'status'=> 1,

            ],
            4 => [
                'id' => 4,
                'title'=> '7 روز ضمانت برگشت',
                'url' => '#',
                'image'=> '/home/assets/images/footer-svg/4.svg',
                'type'=> 'top',
                'status'=> 1,

            ],
            5 => [
                'id' => 5,
                'title'=> 'ضمانت اصل بودن کالا',
                'url' => '#',
                'image'=> '/home/assets/images/footer-svg/5.svg',
                'type'=> 'top',
                'status'=> 1,

            ],
            6 => [
                'id' => 6,
                'title'=> '',
                'url' => '#',
                'image'=> '/home/assets/images/footer-svg/6.svg',
                'type'=> 'bottom',
                'status'=> 1,

            ],
            7 => [
                'id' => 7,
                'title'=> '',
                'url' => '#',
                'image'=> '/home/assets/images/footer-svg/7.svg',
                'type'=> 'bottom',
                'status'=> 1,

            ],
            8 => [
                'id' => 8,
                'title'=> '',
                'url' => '#',
                'image'=> '/home/assets/images/footer-svg/8.svg',
                'type'=> 'bottom',
                'status'=> 1,

            ],
            9 => [
                'id' => 9,
                'title'=> '',
                'url' => '#',
                'image'=> '/home/assets/images/footer-svg/9.svg',
                'type'=> 'bottom',
                'status'=> 1,

            ],
            10 => [
                'id' => 10,
                'title'=> '',
                'url' => '#',
                'image'=> '/home/assets/images/footer-svg/10.svg',
                'type'=> 'bottom',
                'status'=> 1,

            ],
        ];
        foreach ($logos as $logo){
            $check = DB::connection('mysql_settings')->table('footer_logos')->
            where('image',$logo['image'])->first();
            if (!$check){
                DB::connection('mysql_settings')->table('footer_logos')->insert([
                    'title' => $logo['title'] ,
                    'url' => $logo['url'] ,
                    'image' => $logo['image'] ,
                    'type' => $logo['type'] ,
                    'status' => $logo['status'] ,
                ]);
            }
        }

        //Menus
        $menus = [
            1 => [
                'id' => 1,
                'title'=> 'نحوه ثبت سفارش',
                'url' => '#',
                'type'=> 'widgetLabel1',


            ],
            2 => [
                'id' => 2,
                'title'=> 'رویه ارسال سفارش',
                'url' => '#',
                'type'=> 'widgetLabel1',
            ],
            3 => [
                'id' => 3,
                'title'=> 'شیوه‌های پرداخت',
                'url' => '#',
                'type'=> 'widgetLabel1',


            ],
            4 => [
                'id' => 4,
                'title'=> 'پرسش یه پاسخ های متداول',
                'url' => '#',
                'type'=> 'widgetLabel2',
            ],
            5 => [
                'id' => 5,
                'title'=> 'رویه های بازگرداندن کالا',
                'url' => '#',
                'type'=> 'widgetLabel2',
            ],
            6 => [
                'id' => 6,
                'title'=> 'شرایط استفاده',
                'url' => '#',
                'type'=> 'widgetLabel2',
            ],
            7 => [
                'id' => 7,
                'title'=> 'حریم خصوصی',
                'url' => '#',
                'type'=> 'widgetLabel2',
            ],
            8 => [
                'id' => 1,
                'title'=> 'گزارش باگ',
                'url' => '#',
                'type'=> 'widgetLabel2',
            ],

            9 => [
                'id' => 9,
                'title'=> 'اتاق خبر دیجی استور',
                'url' => '#',
                'type'=> 'widgetLabel3',
            ],
            10 => [
                'id' => 10,
                'title'=> 'فروش در دیجی استور',
                'url' => '#',
                'type'=> 'widgetLabel3',
            ],
            11 => [
                'id' => 11,
                'title'=> 'فرصت های شغلی',
                'url' => '#',
                'type'=> 'widgetLabel3',
            ],
            12 => [
                'id' => 12,
                'title'=> 'تماس با دیجی استور',
                'url' => '#',
                'type'=> 'widgetLabel3',
            ],
            13 => [
                'id' => 13,
                'title'=> 'درباره ما دیجی استور',
                'url' => '#',
                'type'=> 'widgetLabel3',
            ],
        ];
        foreach ($menus as $menu){
            $check = DB::connection('mysql_settings')->table('footer_menus')->
            where('title',$menu['title'])->first();
            if (!$check){
                DB::connection('mysql_settings')->table('footer_menus')->insert([
                    'title' => $menu['title'] ,
                    'url' => $menu['url'] ,
                    'type' => $menu['type'] ,
                ]);
            }
        }


    }
}
