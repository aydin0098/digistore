<?php

namespace App\Http\Livewire\Admin\Products\Brands;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Brand;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRequests;
    public Brand $brand;
    public $title;

    protected $rules = [
        'brand.title' => 'nullable',
    ];

    public function store()
    {
        $this->validate();
        $this->brand->update();
        Log::createLog(auth()->user()->id,'update','برند '.$this->brand->description.' ویرایش شد');
        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('admin.brands.index');
    }



    public function render()
    {
        $this->authorize('manage_brands',Brand::class);
        $brand = $this->brand;
        return view('livewire.admin.products.brands.edit',compact('brand'));
    }
}
