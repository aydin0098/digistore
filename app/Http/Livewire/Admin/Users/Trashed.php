<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Role;
use App\Models\User;
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
        $user = User::onlyTrashed()->first();
        $user->forceDelete();
        Log::createLog(auth()->user()->id,'delete','کاربر '.$user->name.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        Log::createLog(auth()->user()->id,'restore','کاربر '.$user->name.' بازیابی شد');
        $this->emit('toast','success','ایتم مورد نظر بازیابی شد');

    }


    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_users',User::class);
        $users = $this->readyToLoad ? User::where('name','LIKE','%'.$this->search.'%')
            ->where('email','LIKE','%'.$this->search.'%')
            ->where('mobile','LIKE','%'.$this->search.'%')
            ->where('typeUser','LIKE','%'.$this->search.'%')->orderBy('id','desc')
            ->onlyTrashed()->paginate(10):[];
        return view('livewire.admin.users.trashed',compact('users'));
    }
}
