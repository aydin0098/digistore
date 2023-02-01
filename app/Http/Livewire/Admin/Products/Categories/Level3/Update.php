<?php

namespace App\Http\Livewire\Admin\Products\Categories\Level3;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    public Category $category;
    public $title;
    public $description;
    public $parent_id;
    public $metaTitle;
    public $metaDescription;

    protected $rules = [
        'category.title' => 'nullable',
        'category.description' => 'nullable',
        'category.metaDescription' => 'nullable',
        'category.metaTitle' => 'nullable',
        'parent_id' => 'nullable'
    ];

    public function store()
    {
        $this->validate();
        $this->category->update();
        Log::createLog(auth()->user()->id,'update','زیر دسته '.$this->category->description.' ویرایش شد');
        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('admin.categories.level3.index');
    }



    public function render()
    {
        $this->authorize('manage_categories',Category::class);
        $category = $this->category;
        $parent = Category::where('level',2)->get();
        return view('livewire.admin.products.categories.level3.update',compact('category','parent'));
    }
}
