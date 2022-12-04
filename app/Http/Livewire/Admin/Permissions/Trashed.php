<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Trashed extends Component
{
    use WithFileUploads;
    use WithPagination;



    public $readyToLoad = false;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';




    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $logo = Permission::onlyTrashed()->first();
        $logo->forceDelete();
        Log::createLog(auth()->user()->id,'delete','دسترسی '.$logo->description.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }
    public function restore($id)
    {
        $logo = Permission::withTrashed()->findOrFail($id);
        $logo->restore();
        Log::createLog(auth()->user()->id,'restore','دسترسی '.$logo->description.' بازیابی شد');
        $this->emit('toast','success','ایتم مورد نظر بازیابی شد');

    }


    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $permissions = $this->readyToLoad ? Permission::where('description','LIKE','%'.$this->search.'%')->orderBy('id','desc')
            ->onlyTrashed()->paginate(10):[];
        return view('livewire.admin.permissions.trashed',compact('permissions'));
    }
}
