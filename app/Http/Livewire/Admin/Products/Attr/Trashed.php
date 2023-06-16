<?php

namespace App\Http\Livewire\Admin\Products\Attr;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Attribute;
use App\Models\Admin\Products\Color;
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
        $attr = Attribute::onlyTrashed()->first();
        $attr->forceDelete();
        Log::createLog(auth()->user()->id,'delete','ویژگی '.$attr->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }
    public function restore($id)
    {
        $attr = Attribute::withTrashed()->findOrFail($id);
        $attr->restore();
        Log::createLog(auth()->user()->id,'restore','ویژگی '.$attr->title.' بازیابی شد');
        $this->emit('toast','success','ایتم مورد نظر بازیابی شد');

    }


    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_attr',Attribute::class);
        $attr = $this->readyToLoad ? Attribute::where('title','LIKE','%'.$this->search.'%')->orderBy('id','desc')
            ->onlyTrashed()->paginate(10):[];
        return view('livewire.admin.products.attr.trashed',compact('attr'));
    }
}
