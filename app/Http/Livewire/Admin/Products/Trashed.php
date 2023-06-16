<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Product;
use App\Models\Admin\Products\Warranty;
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
        $p = Product::onlyTrashed()->first();
        $p->forceDelete();
        Log::createLog(auth()->user()->id,'delete','محصول '.$p->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }
    public function restore($id)
    {
        $p = Product::withTrashed()->findOrFail($id);
        $p->restore();
        Log::createLog(auth()->user()->id,'restore','محصول '.$p->title.' بازیابی شد');
        $this->emit('toast','success','ایتم مورد نظر بازیابی شد');

    }


    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_products',Product::class);
        $products = $this->readyToLoad ? Product::where('title','LIKE','%'.$this->search.'%')->orderBy('id','desc')
            ->onlyTrashed()->paginate(10):[];
        return view('livewire.admin.products.trashed',compact('products'));
    }
}
