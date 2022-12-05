<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $title;
    public $description;
    public $roles;


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
        'permission.description' => 'required'
    ];

    public function store()
    {
        $this->validate();
        $permission = $this->permission->query()->create([
            'title'    => $this->permission->title ,
            'description'     => $this->permission->description,
        ]);
        $permission->roles()->sync($this->roles);

        $this->resetForm();

        Log::createLog(auth()->user()->id,'insert','سطح دسترسی جدیدی اضافه شد');
        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
    }

    public function resetForm()
    {
        $this->permission->title = null;
        $this->permission->description = null;
        $this->roles = '';


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
        $this->authorize('manage_permissions',Permission::class);
        $permissions = $this->readyToLoad ? Permission::where('description','LIKE','%'.$this->search.'%')->latest()->paginate(10):[];
        return view('livewire.admin.permissions.index',compact('permissions'));
    }
}
