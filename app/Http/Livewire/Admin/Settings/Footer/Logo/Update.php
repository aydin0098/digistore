<?php

namespace App\Http\Livewire\Admin\Settings\Footer\Logo;

use App\Models\Admin\Log;
use App\Models\Admin\Settings\FooterLogo;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;


    public $title;
    public $image;
    public $type;
    public $status;
    public $url;




    public FooterLogo $footerLogo;


    protected $rules = [
        'footerLogo.title' => 'nullable',
        'footerLogo.type' => 'required',
        'footerLogo.status' => 'nullable',
        'footerLogo.url' => 'nullable',
    ];

    public function store()
    {
        $this->validate();
        if ($this->image)
        {
            $this->footerLogo->image = updateImage('footerLogo',$this->image,$this->footerLogo->image);
        }
        $this->footerLogo->update();
        Log::createLog(auth()->user()->id,'update','لگو '.$this->footerLogo->title. ' ویرایش شد ');

        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('admin.setting.footer.logo.index');
    }


    public function render()
    {
       $logo = $this->footerLogo;
        return view('livewire.admin.settings.footer.logo.update',compact('logo'));
    }
}
