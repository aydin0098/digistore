<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $title;
    public $description;
    public $role;


    public $readyToLoad = false;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';


    public Permission $permission;

    public function mount()
    {
        $this->permission = new Permission();

    }

    protected $rules = [
        'permission.title' => 'required',
        'permission.description' => 'required',
        'role' => 'required',
    ];

    public function store()
    {
        $this->validate();
        $permission = $this->permission->query()->create([
            'title'    => $this->permission->title ,
            'description'     => $this->permission->description,
        ]);
        $permission->roles()->sync($this->role);

        $this->resetForm();

        Log::createLog(auth()->user()->id,'insert','سطح دسترسی جدیدی اضافه شد');
        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
    }

    public function resetForm()
    {
        $this->permission->title = null;
        $this->permission->description = null;
        $this->permission->role = null;


    }

    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $permission = Permission::find($this->deleteId);
        $permission->delete();
        Log::createLog(auth()->user()->id,'delete','دسترسی '.$permission->description.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }



    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $permissions = $this->readyToLoad ? Permission::where('description','LIKE','%'.$this->search.'%')->latest()->paginate(10):[];
        $roles =  Role::all();
        return view('livewire.admin.permissions.index',compact('permissions','roles'));
    }
}
