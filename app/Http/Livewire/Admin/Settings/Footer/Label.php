<?php

namespace App\Http\Livewire\Admin\Settings\Footer;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Label extends Component
{
    public $upLabel;
    public $widgetLabel1;
    public $widgetLabel2;
    public $widgetLabel3;
    public $rssLabel;
    public $socialLabel;
    public $supportLabel;
    public $phoneLabel;
    public $emailLabel;
    public $aboutHeadLabel;
    public $aboutbodyLabel;
    public $copyright;


    public function __construct()
    {
        $footer = DB::connection('mysql_settings')->table('footers')->first();
        //Variables
        $this->upLabel = $footer->upLabel;
        $this->widgetLabel1 = $footer->widgetLabel1;
        $this->widgetLabel2 = $footer->widgetLabel2;
        $this->widgetLabel3 = $footer->widgetLabel3;

        $this->rssLabel = $footer->rssLabel;
        $this->socialLabel = $footer->socialLabel;
        $this->supportLabel = $footer->supportLabel;
        $this->phoneLabel = $footer->phoneLabel;
        $this->emailLabel = $footer->emailLabel;

        $this->aboutHeadLabel = $footer->aboutHeadLabel;
        $this->aboutbodyLabel = $footer->aboutbodyLabel;

        $this->copyright = $footer->copyright;
    }


    public function update()
    {
        $footer = DB::connection('mysql_settings')->table('footers')->limit(1);

        //update
        $footer->update([
            'upLabel' => $this->upLabel,
            'widgetLabel1' => $this->widgetLabel1,
            'widgetLabel2' => $this->widgetLabel2,
            'widgetLabel3' => $this->widgetLabel3,
            'rssLabel' => $this->rssLabel,
            'socialLabel' => $this->socialLabel,
            'supportLabel' => $this->supportLabel,
            'phoneLabel' => $this->phoneLabel,
            'emailLabel' => $this->emailLabel,
            'aboutHeadLabel' => $this->aboutHeadLabel,
            'aboutbodyLabel' => $this->aboutbodyLabel,
            'copyright' => $this->copyright,
        ]);

        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
    }

    public function render()
    {
        // $footer = DB::connection('mysql_settings')->table('footers')->get();
        // $footer = $footer[0];



        return view('livewire.admin.settings.footer.label');
    }


}
