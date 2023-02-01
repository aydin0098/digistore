<?php

namespace App\Http\Livewire\Admin\Products\Categories\Level2;

use App\Models\Admin\Log;
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
    public $metaTitle;
    public $metaDescription;
    public $parent_id;



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
        'category.metaTitle' => 'nullable',
        'parent_id' => 'required'
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
            'metaTitle'     => $this->category->metaTitle,
            'metaDescription'     => $this->category->metaDescription,
            'slug' => str_replace('','-',$this->category->title),
            'parent_id' => $this->parent_id,
            'level' => 2

        ]);


        $this->resetForm();

        Log::createLog(auth()->user()->id,'insert','زیر دسته جدیدی اضافه شد');
        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
    }

    public function resetForm()
    {
        $this->category->title = null;
        $this->category->description = null;
        $this->category->metaTitle = null;
        $this->category->metaDescription = null;
        $this->parent_id = null;
        $this->category->parent_id =null;



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
        $categories = $this->readyToLoad ? Category::where('title','LIKE','%'.$this->search.'%')
            ->where('level',2)->latest()->paginate(10):[];
        $parent = Category::where('level',1)->where('isActive',1)->get();
        return view('livewire.admin.products.categories.level2.index',compact('categories','parent'));
    }
}
