<?php

namespace App\Http\Livewire\Home\Home\Layouts;

use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        return view('livewire.home.home.layouts.header')->layout('layouts.home');
    }
}
