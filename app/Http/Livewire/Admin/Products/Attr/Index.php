<?php

namespace App\Http\Livewire\Admin\Products\Attr;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Attribute;
use App\Models\Admin\Products\Warranty;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;


    public $title;
    public $isFilter;




    public $readyToLoad = false;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';

    public Attribute $attribute;

    public function mount()
    {
        $this->attribute = new Attribute();

    }

    protected $rules = [
        'attribute.title' => 'required',
        'attribute.isFilter' => 'nullable',
    ];

    public function changeStatus($id)
    {
        $attr = Attribute::find($id);
        if ($attr->isActive==1)
        {
            $attr->update([
                'isActive' => 0
            ]);
        }else
        {
            $attr->update([
                'isActive' => 1
            ]);
        }

    }

    public function changeFilter($id)
    {
        $attr = Attribute::find($id);
        if ($attr->isFilter==1)
        {
            $attr->update([
                'isFilter' => 0
            ]);
        }else
        {
            $attr->update([
                'isFilter' => 1
            ]);
        }

    }



    public function store()
    {
        $this->validate();
        $attr = $this->attribute->query()->create([
            'title'    => $this->attribute->title ,
            'isFilter'    => $this->attribute->isFilter ? 1 : 0 ,

        ]);

        $this->resetForm();

        Log::createLog(auth()->user()->id,'insert','ویژگی جدیدی اضافه شد');
        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
    }

    public function resetForm()
    {
        $this->attribute->title = null;
        $this->attribute->isFilter = null;


    }

    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $attr = Attribute::find($this->deleteId);
        $attr->delete();
        Log::createLog(auth()->user()->id,'delete','ویژگی '.$attr->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }



    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_attr',Attribute::class);
        $attr = $this->readyToLoad ? Attribute::where('title','LIKE','%'.$this->search.'%')->latest()->paginate(10):[];
        return view('livewire.admin.products.attr.index',compact('attr'));
    }
}
