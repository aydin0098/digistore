<?php

namespace App\Http\Livewire\Admin\Products\Categories;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
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
    public $image;
    public $icon;
    public $metaTitle;
    public $metaDescription;

    protected $rules = [
        'category.title' => 'nullable',
        'category.description' => 'nullable',
        'category.metaDescription' => 'nullable',
        'category.icon' => 'nullable',
        'category.metaTitle' => 'nullable'
    ];

    public function store()
    {
        $this->validate();
        $this->category->update();
        if ($this->image)
        {
            $this->category->update([
                'image' => updateImage('categories',$this->image,$this->category->image)
            ]);
        }
        Log::createLog(auth()->user()->id,'update','دسته '.$this->category->description.' ویرایش شد');
        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('admin.categories.index');
    }



    public function render()
    {
        $this->authorize('manage_categories',Category::class);
        $category = $this->category;
        return view('livewire.admin.products.categories.update',compact('category'));
    }
}
