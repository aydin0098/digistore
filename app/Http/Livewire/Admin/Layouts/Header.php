<?php

namespace App\Http\Livewire\Admin\Layouts;

use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $date = verta();
        $date = $date->format(' %d %B %Y');
        $user = auth()->user();
        return view('livewire.admin.layouts.header',compact('date','user'));
    }
}
