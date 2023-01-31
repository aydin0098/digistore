<?php

namespace App\Http\Livewire\Home\Profile;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $user = auth()->user();
        return view('livewire.home.profile.index',compact('user'))->layout('layouts.home');
    }

    public function logout()
    {


    }
}
