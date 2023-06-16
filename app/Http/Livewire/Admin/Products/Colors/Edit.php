<?php

namespace App\Http\Livewire\Admin\Products\Colors;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Category;
use App\Models\Admin\Products\Color;
use App\Models\Admin\Products\Warranty;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public Color $color;

    public $title;
    public $value;

    protected $rules = [
        'color.title' => 'nullable',
        'color.value' => 'nullable',

    ];

    public function store()
    {
        $this->validate();
        $this->color->update();
        Log::createLog(auth()->user()->id,'update','رنگ '.$this->color->title.' ویرایش شد');
        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('admin.colors.index');
    }



    public function render()
    {
        $this->authorize('manage_colors',Color::class);
        $color = $this->color;
        return view('livewire.admin.products.colors.edit',compact('color'));
    }
}
