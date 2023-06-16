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

    public Color $color;

    public function mount()
    {
        $this->color = new Color();

    }

    protected $rules = [
        'color.title' => 'required',
        'color.value' => 'required',
    ];

    public function changeStatus($id)
    {
        $cat = Color::find($id);
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
        $color = $this->color->query()->create([
            'title'    => $this->color->title ,
            'value'    => $this->color->value ,

        ]);

        $this->resetForm();

        Log::createLog(auth()->user()->id,'insert','رنگ جدیدی اضافه شد');
        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
    }

    public function resetForm()
    {
        $this->color->title = null;
        $this->color->value = null;


    }

    public function deleteId($id)
    {
        $this->deleteId = $id;

    }

    public function delete()
    {
        $color = Color::find($this->deleteId);
        $color->delete();
        Log::createLog(auth()->user()->id,'delete','رنگ '.$color->title.' حذف شد');
        $this->emit('toast','success','ایتم مورد نظر به حذف شد');

    }



    public function loadLogo()
    {
        $this->readyToLoad = true;

    }

    public function render()
    {
        $this->authorize('manage_colors',Color::class);
        $colors = $this->readyToLoad ? Color::where('title','LIKE','%'.$this->search.'%')->latest()->paginate(10):[];
        return view('livewire.admin.products.colors.index',compact('colors'));
    }
}
