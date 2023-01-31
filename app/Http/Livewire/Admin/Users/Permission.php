<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Role;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Permission extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $permission;
    public $role;

    public User $user;



    protected $rules = [
        'permission' => '',
        'role' => '',
    ];

    public function store()
    {
        $this->validate();

        $this->user->permissions()->sync($this->permission);
        $this->user->roles()->sync($this->role);

        Log::createLog(auth()->user()->id,'edit','دسترسی های کاربر'.$this->user->name.'ویرایش شد');
        $this->emit('toast', 'success', 'اطلاعات با موفقیت ویرایش شد');
        return to_route('admin.users.index');
    }

    public function render()
    {
        $this->authorize('permission_users',User::class);
        $permissions = \App\Models\Admin\Permissions\Permission::all();
        $roles = Role::all();
        $user = $this->user;
        return view('livewire.admin.users.permission',compact('permissions','roles','user'));
    }
}
