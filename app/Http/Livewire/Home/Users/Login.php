<?php

namespace App\Http\Livewire\Home\Users;

use App\Models\Home\Token;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    use AuthenticatesUsers;

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
        'password' => 'required',
    ];

    public function loginForm()
    {
        $this->validate();
        $user = User::where('mobile', $this->mobile)->first();
        if (isset($user) && $user->isActive==1) {

            if ($user->mobile_verified_at == null) {
                $code = random_int(1000, 9999);
                $token = Token::where('user_id', $user->id)->first();
                if (isset($user->tokens->expired_at)) {
                    if ($user->tokens->expired_at > Carbon::now()) {
                        if ($token) {

                            Token::tokenUpdate($token,$user->id,$code,'verify',$user->mobile);

                        }else
                        {
                            Token::tokenCreate($user->id,$code,'verify',$user->mobile);
                        }
                    }
                } else {
                    if ($token) {
                        Token::tokenUpdate($token,$user->id,$code,'verify',$user->mobile);
                    }else
                    {
                        Token::tokenCreate($user->id,$code,'verify',$user->mobile);
                    }
                }
                return to_route('verify.mobile', $user->id);
            }

            if (Hash::check($this->password, $user->password)) {
                Auth::login($user);
                //TODO
                return to_route('admin.index');
            } else {
                $this->emit('toast', 'error', 'اطلاعات ورود نادرست است');
            }

        } elseif ($user->isActive==0){
            $this->emit('toast', 'error', 'اکانت کاربری شما غیر فعال است ');

        } else {

            $this->emit('toast', 'error', 'شما در این سایت ثبت نام نکرده اید !');

        }

    }


    public function render()
    {

        return view('livewire.home.users.login')->layout('layouts.auth');
    }
}
