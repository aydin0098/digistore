<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
use App\Models\Admin\Settings\FooterLogo;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
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
        $user = User::find($this->deleteId);
        $user->delete();
        Log::createLog(auth()->user()->id,'delete','نقش '.$user->name.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }



    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        if ($user->isActive==1)
        {
            $user->update([
                'isActive' => 0
            ]);
            Log::createLog(auth()->user()->id,'update','وضعیت کاربر '.$user->name.'  تغییر یافت');
            $this->emit('toast','success','وضعیت به غیرفعال تغییر یافت');

        }else{
            $user->update([
                'isActive' => 1
            ]);

            Log::createLog(auth()->user()->id,'update','وضعیت کاربر '.$user->name.'  تغییر یافت');

            $this->emit('toast','success','وضعیت به فعال شده تغییر یافت');
        }

    }

    public function changeStatusMobile($id)
    {
        $user = User::find($id);
        if ($user->mobile_verified_at != null)
        {
            $user->update([
                'mobile_verified_at' => null
            ]);
            Log::createLog(auth()->user()->id,'update','وضعیت موبایل کاربر '.$user->name.'  تغییر یافت');
            $this->emit('toast','success','وضعیت به تایید نشده تغییر یافت');

        }else{
            $user->update([
                'mobile_verified_at' => now()
            ]);

            Log::createLog(auth()->user()->id,'update','وضعیت موبایل کاربر '.$user->name.'  تغییر یافت');

            $this->emit('toast','success','وضعیت به تایید شده تغییر یافت');
        }

    }

    public function changeStatusEmail($id)
    {
        $user = User::find($id);
        if ($user->email_verified_at != null)
        {
            $user->update([
                'email_verified_at' => null
            ]);
            Log::createLog(auth()->user()->id,'update','وضعیت ایمیل کاربر '.$user->name.'  تغییر یافت');
            $this->emit('toast','success','وضعیت به تایید نشده تغییر یافت');

        }else{
            $user->update([
                'email_verified_at' => now()
            ]);

            Log::createLog(auth()->user()->id,'update','وضعیت ایمیل کاربر '.$user->name.'  تغییر یافت');

            $this->emit('toast','success','وضعیت به تایید شده تغییر یافت');
        }

    }

    public function loginForce($id)
    {
       Auth::logout();
       Auth::loginUsingId($id);
       return to_route('home.index');


    }

    public function render()
    {
        $this->authorize('manage_users',User::class);
        $users = $this->readyToLoad ? User::where('name','LIKE','%'.$this->search.'%')
            ->orWhere('email','LIKE','%'.$this->search.'%')
            ->orWhere('mobile','LIKE','%'.$this->search.'%')
            ->orWhere('typeUser','LIKE','%'.$this->search.'%')->latest()->paginate(10):[];

        return view('livewire.admin.users.index',compact('users'));
    }
}
