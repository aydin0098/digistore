<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Color;
use App\Models\Admin\Products\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;


    public $title;
    public $value;
    public $isActive;




    public $readyToLoad = false;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';

    public Product $product;


    public function changeStatus($id)
    {
        $p = Product::find($id);
        if ($p->isActive==1)
        {
            $p->update([
                'isActive' => 0
            ]);
        }else
        {
            $p->update([
                'isActive' => 1
            ]);
        }

    }

    public function changeSpecial($id)
    {
        $p = Product::find($id);
        if ($p->special==1)
        {
            $p->update([
                'special' => 0
            ]);
        }else
        {
            $p->update([
                'special' => 1
            ]);
        }

    }

    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $p = Product::find($this->deleteId);
        $p->delete();
        Log::createLog(auth()->user()->id,'delete','محصول '.$p->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }



    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_products',Product::class);
        $products = $this->readyToLoad ? Product::where('title','LIKE','%'.$this->search.'%')->latest()->paginate(10):[];
        return view('livewire.admin.products.index',compact('products'));
    }
}
