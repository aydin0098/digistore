<?php

namespace App\Http\Livewire\Home\Home\Layouts;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{

    public function logout($id)
    {
        Auth::logout();
        $this->emit('toast', 'success', 'کاربر عزیز شما از حساب کاربریتان خارج شدید');

    }

    public function render()
    {
        $user = auth()->user();
        return view('livewire.home.home.layouts.header',compact('user'))->layout('layouts.home');
    }
}
