<?php

namespace App\Http\Livewire\Home\Users;

use App\Models\Home\Token;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{




    public User $user;

    public $name;
    public $mobile;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->user = new User();


    }

    protected $rules = [
        'name' => 'required',
        'mobile' => 'required|ir_mobile',
        'password' => 'required|min:8|confirmed',
    ];

    public function registerForm()
    {
        $this->validate();
        $code = random_int(1000, 9999);
        $userExist = User::where('mobile',$this->mobile)->first();
        if ($userExist && $userExist->mobile_verified_at==null)
        {
            $token = Token::where('user_id', $userExist->id)->first();
            if ($token) {

                Token::tokenUpdate($token,$userExist->id,$code,'verify',$userExist->mobile);
                return to_route('verify.mobile', $userExist->id);
            }else
            {
              Token::tokenCreate($userExist->id,$code,'verify',$userExist->mobile);
                return to_route('verify.mobile', $userExist->id);
            }

        }elseif($userExist && $userExist->mobile_verified_at!=null)
        {
            $this->emit('toast', 'error', 'شماره تلفن همراه قبلا ثبت شده است');

        }else{
            $user = User::create([
                'name' => $this->name,
                'mobile' => $this->mobile,
                'password' => Hash::make($this->password)
            ]);
            Token::tokenCreate($user->id,$code,'verify',$user->mobile);
            return to_route('verify.mobile', $user->id);
        }
    }


    public function render()
    {
        return view('livewire.home.users.register')->layout('layouts.auth');
    }
}
