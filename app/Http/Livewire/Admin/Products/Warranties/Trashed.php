<?php

namespace App\Http\Livewire\Admin\Products\Warranties;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Category;
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
        $warranty = Warranty::onlyTrashed()->first();
        $warranty->forceDelete();
        Log::createLog(auth()->user()->id,'delete','گارانتی '.$warranty->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }
    public function restore($id)
    {
        $warranty = Warranty::withTrashed()->findOrFail($id);
        $warranty->restore();
        Log::createLog(auth()->user()->id,'restore','گارانتی '.$warranty->title.' بازیابی شد');
        $this->emit('toast','success','ایتم مورد نظر بازیابی شد');

    }


    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_warranties',Warranty::class);
        $warranties = $this->readyToLoad ? Warranty::where('title','LIKE','%'.$this->search.'%')->orderBy('id','desc')
            ->onlyTrashed()->paginate(10):[];
        return view('livewire.admin.products.warranties.trashed',compact('warranties'));
    }
}
