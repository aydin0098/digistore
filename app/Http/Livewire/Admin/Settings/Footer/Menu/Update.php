<?php

namespace App\Http\Livewire\Admin\Settings\Footer\Menu;

use App\Models\Admin\Log;
use App\Models\Admin\Settings\FooterMenu;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;


    public $title;
    public $type;
    public $url;




    public FooterMenu $footerMenu;


    protected $rules = [
        'footerMenu.title' => 'required',
        'footerMenu.type' => 'required',
        'footerMenu.url' => 'nullable',
    ];

    public function store()
    {
        $this->validate();
        $this->footerMenu->update();
        Log::createLog(auth()->user()->id,'update','منو '.$this->footerMenu->title.' ویرایش شد');
        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('admin.setting.footer.menu.index');
    }


    public function render()
    {
        $menu = $this->footerMenu;
        $footer = DB::connection('mysql_settings')->table('footers')->first();
        $headerMenu[] = $footer->widgetLabel1;
        $headerMenu[] = $footer->widgetLabel2;
        $headerMenu[] = $footer->widgetLabel3;
        $headerMenu[] = $footer->widgetLabel4;
//        $headerMenu[] = $footer->widgetLabel5;
//        $headerMenu[] = $footer->widgetLabel6;
        return view('livewire.admin.settings.footer.menu.update',compact('menu','headerMenu'));
    }
}
