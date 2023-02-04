<?php

namespace App\Http\Livewire\Home\Home\Layouts;

use App\Models\Admin\Products\Category;
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
        $categories = Category::where('isActive',1)->where('level',1)->get();
        $cat_level2 = Category::where('isActive',1)->where('level',2)->get();
        $cat_level3 = Category::where('isActive',1)->where('level',3)->get();
        return view('livewire.home.home.layouts.header',compact(
            'user', 'cat_level2','categories','cat_level3'))
            ->layout('layouts.home');
    }
}
