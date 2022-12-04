<?php

namespace App\Http\Livewire\Home\Users;

use App\Models\Home\Token;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ForgetPassword extends Component
{
    public User $user;

    public $mobile;
    public $password;

    public function mount()
    {
        if (Auth::check())
        {
            if(\auth()->user()->mobile_verified_at)
            {
                return to_route('admin.index');
            }
        }

    }



    protected $rules = [
        'mobile' => 'required|ir_mobile',
    ];

    public function forgetForm()
    {
        $this->validate();
        $userExist = User::where('mobile',$this->mobile)->first();
        $code = random_int(1000, 9999);
        if ($userExist)
        {
            $token = Token::where('user_id', $userExist->id)->first();
            if ($token) {
                Token::tokenUpdate($token,$userExist->id,$code,'forgetPassword',$userExist->mobile);
                return to_route('forget.password.verify', $userExist->id);
            }else
            {
               Token::tokenCreate($userExist->id,$code,'forgetPassword',$userExist->mobile);
                return to_route('forget.password.verify', $userExist->id);
            }

        }else{
            $this->emit('toast', 'error', 'کاربری با این مشخصات یافت نشد');
        }


    }


    public function render()
    {
        return view('livewire.home.users.forget-password')->layout('layouts.auth');
    }
}

