<?php

namespace App\Http\Livewire\Home\Users;

use App\Models\Home\Token;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class VerifyMobile extends Component
{
    public $user;
    public $code;
    public $token;

    protected $rules = [
        'code' => 'required|min:4|numeric'
    ];

    public function mount($id)
    {
        $this->user = User::find($id);
        $this->token = Token::where('user_id', $id)->latest()->first();


    }

    public function verifyCode()
    {
        $this->validate();
        if ($this->token->code == $this->code) {

            if ($this->token->expired_at > Carbon::now()) {
                //TODO Check User Rule
                $this->user->update([
                    'mobile_verified_at' => now()
                ]);
                auth()->loginUsingId($this->user->id);

                $this->token->delete();

                return to_route('admin.index');
            } else {
                $this->emit('toast', 'error', 'کد تاییدیه منقضی شده');
            }
        } else {
            $this->emit('toast', 'error', 'کد تاییدیه نادرست است');
        }

    }

    public function resendSms($id)
    {
        $user = User::find($id);
        $token = Token::where('user_id', $user->id)->first();
        $code = random_int(1000, 9999);
        if ($token) {
            Token::tokenUpdate($token,$user->id,$code,'resendSms',$user->mobile);
            return $this->redirect(request()->header('Referer'));
        }else
        {
            Token::tokenCreate($user->id,$code,'resendSms',$user->mobile);
            return $this->redirect(request()->header('Referer'));
        }
    }

    public function render()
    {
        $user = $this->user;
        $code = $this->code;
        return view('livewire.home.users.verify-mobile', compact('user', 'code'))->layout('layouts.auth');
    }
}
