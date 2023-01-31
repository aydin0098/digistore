<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Admin\Log;
use App\Models\Admin\Settings\FooterLogo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;


    public $name;
    public $mobile;
    public $email;
    public $typeUser;
    public $password;
    public $profilePhoto;
    public $userActive;
    public $mobile_verified_at;
    public $email_verified_at;


    public User $user;




    public FooterLogo $footerLogo;


    protected $rules = [
        'user.name' => 'nullable',
        'user.mobile' => 'nullable',
        'user.email' => 'nullable',
        'user.typeUser' => 'nullable',
        'password' => 'nullable',
        'user.profilePhoto' => 'nullable',
        'user.isActive' => 'nullable',
        'user.mobile_verified_at' => 'nullable',
        'user.email_verified_at' => 'nullable'
    ];

    public function store()
    {
        $this->validate();

        //TODO Email Verified Update

        if ($this->user->mobile_verified_at)
        {
           $this->user->update([
               'mobile_verified_at' => Carbon::now()
           ]);
        }else{
            $this->user->update([
                'mobile_verified_at' => null
            ]);
        }




        $this->user->update();

        if ($this->password !=null)
        {
            $this->user->update([
                'password' => Hash::make($this->password)
            ]);
        }

        if ($this->profilePhoto){
            $this->user->update([
                'profilePhoto' => updateImage('users',$this->profilePhoto,$this->user->profilePhoto)
            ]);
        }



        Log::createLog(auth()->user()->id,'update','کاربر '.$this->user->name. ' ویرایش شد ');

        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('admin.users.index');
    }


    public function render()
    {
        $this->authorize('manage_users',User::class);
        $user = $this->user;
        return view('livewire.admin.users.edit',compact('user'));
    }
}
