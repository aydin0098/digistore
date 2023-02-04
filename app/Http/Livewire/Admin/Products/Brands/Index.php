<?php

namespace App\Http\Livewire\Admin\Products\Brands;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
use App\Models\Admin\Products\Brand;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
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


    public Brand $brand;

    public function mount()
    {
        $this->brand = new Brand();

    }

    protected $rules = [
        'brand.title' => 'required',
    ];

    public function store()
    {
        $this->validate();
        $brand = $this->brand->query()->create([
            'title'    => $this->brand->title ,
        ]);

        $this->resetForm();

        Log::createLog(auth()->user()->id,'insert','برند جدیدی اضافه شد');
        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
    }

    public function resetForm()
    {
        $this->brand->title = null;


    }

    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $brand = Brand::find($this->deleteId);
        $brand->delete();
        Log::createLog(auth()->user()->id,'delete','برند '.$brand->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }



    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_brands',Brand::class);
        $brands = $this->readyToLoad ? Brand::where('title','LIKE','%'.$this->search.'%')->latest()->paginate(10):[];
        return view('livewire.admin.products.brands.index',compact('brands'));
    }
}
