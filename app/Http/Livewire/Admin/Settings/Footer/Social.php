<?php

namespace App\Http\Livewire\Admin\Settings\Footer;

use App\Models\Admin\Log;
use App\Models\Admin\Settings\SocialFooter;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Social extends Component
{
    use AuthorizesRequests;
    public $email;
    public $phone;
    public $socialIcon1;
    public $socialLink1;
    public $socialIcon2;
    public $socialLink2;
    public $socialIcon3;
    public $socialLink3;
    public $socialIcon4;
    public $socialLink4;
    public $socialIcon5;
    public $socialLink5;
    public $socialIcon6;
    public $socialLink6;
    public $socialIcon7;
    public $socialLink7;
    public $socialIcon8;
    public $socialLink8;


    public function __construct()
    {
        $footer = DB::connection('mysql_settings')->table('footers')->first();
        //Variables
        $this->email = $footer->email;
        $this->phone = $footer->phone;
        $this->socialIcon1 = $footer->socialIcon1;
        $this->socialLink1 = $footer->socialLink1;
        $this->socialIcon2 = $footer->socialIcon2;
        $this->socialLink2 = $footer->socialLink2;
        $this->socialIcon3 = $footer->socialIcon3;
        $this->socialLink3 = $footer->socialLink3;
        $this->socialIcon4 = $footer->socialIcon4;
        $this->socialLink4 = $footer->socialLink4;
        $this->socialIcon5 = $footer->socialIcon5;
        $this->socialLink5 = $footer->socialLink5;
        $this->socialIcon6 = $footer->socialIcon6;
        $this->socialLink6 = $footer->socialLink6;
        $this->socialIcon7 = $footer->socialIcon7;
        $this->socialLink7 = $footer->socialLink7;
        $this->socialIcon8 = $footer->socialIcon8;
        $this->socialLink8 = $footer->socialLink8;
    }


    public function update()
    {
        $footer = DB::connection('mysql_settings')->table('footers')->limit(1);

        //update
        $footer->update([
            'email' => $this->email,
            'phone' => $this->phone,
            'socialIcon1' => $this->socialIcon1,
            'socialLink1' => $this->socialLink1,
            'socialIcon2' => $this->socialIcon2,
            'socialLink2' => $this->socialLink2,
            'socialIcon3' => $this->socialIcon3,
            'socialLink3' => $this->socialLink3,
            'socialIcon4' => $this->socialIcon4,
            'socialLink4' => $this->socialLink4,
            'socialIcon5' => $this->socialIcon5,
            'socialLink5' => $this->socialLink5,
            'socialIcon6' => $this->socialIcon6,
            'socialLink6' => $this->socialLink6,
            'socialIcon7' => $this->socialIcon7,
            'socialLink7' => $this->socialLink7,
            'socialIcon8' => $this->socialIcon8,
            'socialLink8' => $this->socialLink8,
        ]);


        Log::createLog(auth()->user()->id,'update','شبکه اجتماعی ویرایش شد');

        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
    }

    public function render()
    {
        $this->authorize('setting-footer-social',SocialFooter::class);
        return view('livewire.admin.settings.footer.social');
    }
}
