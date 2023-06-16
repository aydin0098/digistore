<?php

namespace App\Http\Livewire\Admin\Products\Colors;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Category;
use App\Models\Admin\Products\Color;
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
        $color = Color::onlyTrashed()->first();
        $color->forceDelete();
        Log::createLog(auth()->user()->id,'delete','رنگ '.$color->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }
    public function restore($id)
    {
        $color = Color::withTrashed()->findOrFail($id);
        $color->restore();
        Log::createLog(auth()->user()->id,'restore','رنگ '.$color->title.' بازیابی شد');
        $this->emit('toast','success','ایتم مورد نظر بازیابی شد');

    }


    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_colors',Color::class);
        $colors = $this->readyToLoad ? Color::where('title','LIKE','%'.$this->search.'%')->orderBy('id','desc')
            ->onlyTrashed()->paginate(10):[];
        return view('livewire.admin.products.colors.trashed',compact('colors'));
    }
}
