<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
use Livewire\Component;

class Edit extends Component
{
    public Permission $permission;
    public $title;
    public $description;
    public $roles;

    protected $rules = [
        'permission.title' => 'required',
        'permission.description' => 'required',
        'roles' => 'required'
    ];

    public function store()
    {
        $this->validate();
        $this->permission->update();
        $this->permission->roles()->sync($this->roles);
        Log::createLog(auth()->user()->id,'update','دسترسی '.$this->permission->description.' ویرایش شد');
        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('admin.permissions.index');
    }



    public function render()
    {
        $permission = $this->permission;
        $permissions = Permission::all();
        return view('livewire.admin.permissions.edit',compact('permission'));
    }
}
