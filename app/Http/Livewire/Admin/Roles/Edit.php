<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRequests;
    public Role $role;
    public $title;
    public $description;
    public $permissions;

    protected $rules = [
        'role.title' => 'required',
        'role.description' => 'required',
        'permissions' => 'required'
    ];

    public function store()
    {
        $this->validate();
        $this->role->update();
        $this->role->permissions()->sync($this->permissions);
        Log::createLog(auth()->user()->id,'update','نقش '.$this->role->description.' ویرایش شد');
        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('admin.roles.index');
    }



    public function render()
    {
        $this->authorize('manage_roles',Role::class);
        $role = $this->role;
        $permissions = Permission::all();
        return view('livewire.admin.roles.edit',compact('role','permissions'));
    }
}
