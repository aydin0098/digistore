<?php

namespace App\Http\Livewire\Admin\Products\Categories;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
use App\Models\Admin\Products\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    use WithFileUploads;

    public $title;
    public $description;
    public $image;
    public $icon;
    public $metaTitle;
    public $metaDescription;



    public $readyToLoad = false;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';

    public Category $category;

    public function mount()
    {
        $this->category = new Category();

    }

    protected $rules = [
        'category.title' => 'required',
        'category.description' => 'required',
        'category.metaDescription' => 'nullable',
        'category.icon' => 'nullable',
        'category.metaTitle' => 'nullable'
    ];

    public function changeStatus($id)
    {
        $cat = Category::find($id);
        if ($cat->isActive==1)
        {
            $cat->update([
                'isActive' => 0
            ]);
        }else
        {
            $cat->update([
                'isActive' => 1
            ]);
        }

    }

    public function store()
    {
        $this->validate();
        $category = $this->category->query()->create([
            'title'    => $this->category->title ,
            'description'     => $this->category->description,
            'icon'     => $this->category->icon,
            'metaTitle'     => $this->category->metaTitle,
            'metaDescription'     => $this->category->metaDescription,
            'slug' => str_replace('','-',$this->category->title),
            'level' => 1

        ]);

        if ($this->image)
        {
           $category->update([
               'image' => uploadImage('categories',$this->image)
           ]);
        }

        $this->resetForm();

        Log::createLog(auth()->user()->id,'insert','دسته جدیدی اضافه شد');
        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
    }

    public function resetForm()
    {
        $this->category->title = null;
        $this->category->description = null;
        $this->category->image = null;
        $this->category->metaTitle = null;
        $this->category->metaDescription = null;
        $this->category->icon = null;



    }

    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $category = Category::find($this->deleteId);
        $category->delete();
        Log::createLog(auth()->user()->id,'delete','دسته '.$category->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }



    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_categories',Category::class);
        $categories = $this->readyToLoad ? Category::where('title','LIKE','%'.$this->search.'%')->latest()->paginate(10):[];
        return view('livewire.admin.products.categories.index',compact('categories'));
    }
}
