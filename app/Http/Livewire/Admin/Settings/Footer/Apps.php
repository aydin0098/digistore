<?php

namespace App\Http\Livewire\Admin\Settings\Footer;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Apps extends Component
{
    public $enamad;
    public $linkApp1;
    public $imageApp1;
    public $linkApp2;
    public $imageApp2;


    public function __construct()
    {
        $footer = DB::connection('mysql_settings')->table('footers')->first();
        //Variables
        $this->enamad = $footer->enamad;
        $this->linkApp1 = $footer->linkApp1;
        $this->imageApp1 = $footer->imageApp1;
        $this->linkApp2 = $footer->linkApp2;
        $this->imageApp2 = $footer->imageApp2;
    }


    public function update()
    {
        $footer = DB::connection('mysql_settings')->table('footers')->limit(1);

        //update
        $footer->update([
            'enamad' => $this->enamad,
            'linkApp1' => $this->linkApp1,
            'imageApp1' => $this->imageApp1,
            'linkApp2' => $this->linkApp2,
            'imageApp2' => $this->imageApp2,
        ]);

        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
    }

    public function render()
    {
        // $footer = DB::connection('mysql_settings')->table('footers')->get();
        // $footer = $footer[0];



        return view('livewire.admin.settings.footer.apps');
    }
}
