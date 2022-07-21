<?php

namespace App\Http\Livewire\Home\Home\Layouts;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $footer = DB::connection('mysql_settings')->table('footers')->get();
        $footer = $footer[0];
        return view('livewire.home.home.layouts.footer',compact('footer'))->layout('layouts.home');
    }
}
