<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Create extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $name;
    public $mobile;
    public $email;
    public $password;
    public $typeUser;
    public $profilePhoto;
    public $isActive;
    public $email_verified_at;
    public $mobile_verified_at;



    public User $user;

    public function mount()
    {
        $this->user = new User();

    }

    protected $rules = [
        'name' => 'required',
        'mobile' => 'required',
        'email' => 'nullable|email',
        'password' => 'required',
        'typeUser' => 'required',
        'isActive' => 'nullable',
        'mobile_verified_at' => 'nullable',
        'email_verified_at' => 'nullable',
    ];

    public function store()
    {
        $this->validate();
         User::create([
            'name'    => $this->name,
            'mobile'     => $this->mobile,
            'email'     => $this->email,
            'password'     => Hash::make($this->password),
            'typeUser'     => $this->typeUser,
             'profilePhoto' => $this->profilePhoto ? uploadImage('users',$this->profilePhoto) : null,
             'isActive' => $this->isActive ? 1 : 0,
             'email_verified_at' => $this->email_verified_at ? Carbon::now() : null,
             'mobile_verified_at' => $this->mobile_verified_at ? Carbon::now() : null
        ]);



        Log::createLog(auth()->user()->id,'insert','کاربر جدیدی اضافه شد');
        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
        return redirect()->route('admin.users.index');
    }

    public function render()
    {
        $this->authorize('manage_users',User::class);
        return view('livewire.admin.users.create');
    }
}
