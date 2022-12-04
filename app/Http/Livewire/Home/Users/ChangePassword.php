<?php

namespace App\Http\Livewire\Home\Users;

use App\Models\Home\Token;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $user;
    public $password;
    public $password_confirmation;
    public $token;


    protected $rules = [
        'password' => 'required|min:8|confirmed',
    ];

    public function mount($code)
    {
        $this->token = Token::where('code',$code)->latest()->first();
        $this->user = User::find($this->token->user_id);
    }

    public function changePassword()
    {
        $this->validate();
        $this->user->update([
            'password' => Hash::make($this->password)
        ]);
        Auth::loginUsingId($this->user->id);
        return to_route('admin.index');
    }



    public function render()
    {
        return view('livewire.home.users.change-password')->layout('layouts.auth');
    }
}
