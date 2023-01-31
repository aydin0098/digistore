<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class Info extends Component
{
    public User $user;
    public function render()
    {
        $user = $this->user;
        return view('livewire.admin.users.info',compact('user'));
    }
}
