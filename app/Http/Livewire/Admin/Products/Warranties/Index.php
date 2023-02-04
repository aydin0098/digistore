<?php

namespace App\Http\Livewire\Admin\Products\Warranties;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Category;
use App\Models\Admin\Products\Warranty;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;


    public $title;




    public $readyToLoad = false;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';

    public Warranty $warranty;

    public function mount()
    {
        $this->warranty = new Warranty();

    }

    protected $rules = [
        'warranty.title' => 'required',
    ];

    public function changeStatus($id)
    {
        $cat = Warranty::find($id);
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
        $warranty = $this->warranty->query()->create([
            'title'    => $this->warranty->title ,

        ]);

        $this->resetForm();

        Log::createLog(auth()->user()->id,'insert','گارانتی جدیدی اضافه شد');
        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
    }

    public function resetForm()
    {
        $this->warranty->title = null;


    }

    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $warranty = Warranty::find($this->deleteId);
        $warranty->delete();
        Log::createLog(auth()->user()->id,'delete','گارانتی '.$warranty->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }



    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_warranties',Warranty::class);
        $warranties = $this->readyToLoad ? Warranty::where('title','LIKE','%'.$this->search.'%')->latest()->paginate(10):[];
        return view('livewire.admin.products.warranties.index',compact('warranties'));
    }
}
