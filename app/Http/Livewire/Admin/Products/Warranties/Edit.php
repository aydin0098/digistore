<?php

namespace App\Http\Livewire\Admin\Products\Warranties;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Category;
use App\Models\Admin\Products\Warranty;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    public Warranty $warranty;
    public $title;

    protected $rules = [
        'warranty.title' => 'nullable',

    ];

    public function store()
    {
        $this->validate();
        $this->warranty->update();
        Log::createLog(auth()->user()->id,'update','گارانتی '.$this->warranty->title.' ویرایش شد');
        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('admin.warranties.index');
    }



    public function render()
    {
        $this->authorize('manage_warranties',Warranty::class);
        $warranty = $this->warranty;
        return view('livewire.admin.products.warranties.edit',compact('warranty'));
    }
}
