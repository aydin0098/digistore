<?php

namespace App\Http\Livewire\Home\Home\Layouts;

use App\Models\Admin\Settings\FooterMenu;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $footer = DB::connection('mysql_settings')->table('footers')->get();
        $footer = $footer[0];
        $topFooterLogo = DB::connection('mysql_settings')->table('footer_logos')
            ->where('status',1)->where('type','top')->get();
        $bottomFooterLogo = DB::connection('mysql_settings')->table('footer_logos')
            ->where('status',1)->where('type','bottom')->get();
        $menus1 = FooterMenu::where('type','widgetLabel1')->get();
        $menus2 = FooterMenu::where('type','widgetLabel2')->get();
        $menus3 = FooterMenu::where('type','widgetLabel3')->get();

        return view('livewire.home.home.layouts.footer',[
            'footer' => $footer,
            'topLogo' => $topFooterLogo,
            'bottomLogo' => $bottomFooterLogo,
            'menus1' => $menus1,
            'menus2' => $menus2,
            'menus3' => $menus3,
        ])->layout('layouts.home');
    }
}
