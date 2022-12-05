<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Role;
use App\Models\Admin\Settings\FooterLogo;
use App\Models\Admin\Settings\FooterMenu;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Trashed extends Component
{
    use WithFileUploads;
    use WithPagination;
    use AuthorizesRequests;



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
        $logo = Role::onlyTrashed()->first();
        $logo->forceDelete();
        Log::createLog(auth()->user()->id,'delete','نقش '.$logo->description.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }
    public function restore($id)
    {
        $logo = Role::withTrashed()->findOrFail($id);
        $logo->restore();
        Log::createLog(auth()->user()->id,'restore','نقش '.$logo->description.' بازیابی شد');
        $this->emit('toast','success','ایتم مورد نظر بازیابی شد');

    }


    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_roles',Role::class);
        $roles = $this->readyToLoad ? Role::where('description','LIKE','%'.$this->search.'%')->orderBy('id','desc')
            ->onlyTrashed()->paginate(10):[];
        return view('livewire.admin.roles.trashed',compact('roles'));
    }
}
