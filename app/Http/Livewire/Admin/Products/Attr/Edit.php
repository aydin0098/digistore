<?php

namespace App\Http\Livewire\Admin\Products\Attr;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Attribute;
use App\Models\Admin\Products\Warranty;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    public Attribute $attribute;
    public $title;
    public $isFilter;
    public $isActive;

    protected $rules = [
        'attribute.title' => 'nullable',
        'attribute.isFilter' => 'nullable',
        'attribute.isActive' => 'nullable',

    ];

    public function store()
    {
        $this->validate();
        $this->attribute->update();
        Log::createLog(auth()->user()->id,'update','ویژگی '.$this->attribute->title.' ویرایش شد');
        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('admin.attr.index');
    }



    public function render()
    {
        $this->authorize('manage_attr',Attribute::class);
        $attr = $this->attribute;
        return view('livewire.admin.products.attr.edit',compact('attr'));
    }
}
