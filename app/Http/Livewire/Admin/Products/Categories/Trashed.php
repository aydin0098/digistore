<?php

namespace App\Http\Livewire\Admin\Products\Categories;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Products\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Trashed extends Component
{
    use WithFileUploads;
    use WithPagination;
    use AuthorizesRequests;



    public $readyToLoad = false;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';




    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $cat = Category::onlyTrashed()->first();
        if ($cat->image)
        {
            unlink($cat->image);
        }
        $cat->forceDelete();
        Log::createLog(auth()->user()->id,'delete','دسته '.$cat->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }
    public function restore($id)
    {
        $cat = Category::withTrashed()->findOrFail($id);
        $cat->restore();
        Log::createLog(auth()->user()->id,'restore','دسته '.$cat->title.' بازیابی شد');
        $this->emit('toast','success','ایتم مورد نظر بازیابی شد');

    }


    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_categories',Category::class);
        $categories = $this->readyToLoad ? Category::where('title','LIKE','%'.$this->search.'%')->orderBy('id','desc')
            ->onlyTrashed()->paginate(10):[];
        return view('livewire.admin.products.categories.trashed',compact('categories'));
    }
}
