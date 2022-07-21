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
                'socialLink9' => '#',
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
                    'socialLink9' => $footer['socialLink9'] ,
                ]);
            }
        }


    }
}
