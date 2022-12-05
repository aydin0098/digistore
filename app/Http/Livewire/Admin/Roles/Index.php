<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
use App\Models\Admin\Settings\FooterMenu;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $title;
    public $description;
    public $permission;


    public $readyToLoad = false;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';


    public Role $role;

    public function mount()
    {
        $this->role = new Role();

    }

    protected $rules = [
        'role.title' => 'required',
        'role.description' => 'required',
        'permission' => 'required',
    ];

    public function store()
    {
        $this->validate();
        $role = $this->role->query()->create([
            'title'    => $this->role->title ,
            'description'     => $this->role->description,
        ]);
        $role->permissions()->sync($this->permission);

        $this->resetForm();

        Log::createLog(auth()->user()->id,'insert','نقش جدیدی اضافه شد');
        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
    }

    public function resetForm()
    {
        $this->role->title = null;
        $this->role->description = null;
        $this->role->permission = null;


    }

    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $role = Role::find($this->deleteId);
        $role->delete();
        Log::createLog(auth()->user()->id,'delete','نقش '.$role->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }



    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_roles',Role::class);
        $roles = $this->readyToLoad ? Role::where('description','LIKE','%'.$this->search.'%')->latest()->paginate(10):[];
        $permissions =  Permission::all();
        return view('livewire.admin.roles.index',compact('roles','permissions'));
    }
}
