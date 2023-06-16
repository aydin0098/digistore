<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Brand;
use App\Models\Admin\Products\Category;
use App\Models\Admin\Products\Color;
use App\Models\Admin\Products\Product;
use App\Models\Admin\Products\Tag;
use App\Models\Admin\Products\Warranty;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use AuthorizesRequests;
    use WithFileUploads;

    public Product $product;
    public $title;
    public $ename;
    public $image;
    public $level1_id;
    public $level2_id;
    public $level3_id;
    public $brand_id;
    public $description;
    public $body;
    public $price;
    public $discount_price;
    public $number;
    public $weight;
    public $orderMax;
    public $orderMin;
    public $isActive;
    public $special;
    public $tag_id;
    public $color_id;
    public $warranty_id;

    protected $rules = [
        'product.title' => 'nullable',
        'product.ename' => 'nullable',
        'product.level1_id' => 'nullable',
        'product.level2_id' => 'nullable',
        'product.level3_id' => 'nullable',
        'product.brand_id' => 'nullable',
        'product.description' => 'nullable',
        'product.body' => 'nullable',
        'product.price' => 'nullable',
        'product.discount_price' => 'nullable',
        'product.count' => 'nullable',
        'product.weight' => 'nullable',
        'product.orderMax' => 'nullable',
        'product.orderMin' => 'nullable',
        'product.isActive' => 'nullable',
        'product.special' => 'nullable',
        'tag_id' => 'nullable',
        'color_id' => 'nullable',
        'product.warranty_id' => 'nullable',
        'image' => 'nullable'
    ];

    public function store()
    {
        $this->validate();





        $this->product->update();
        if ($this->tag_id)
        {
            $this->product->tags()->sync($this->tag_id);
        }

        if ($this->color_id)
        {
            $this->product->colors()->sync($this->color_id);
        }




        if ($this->image){
            $this->product->update([
                'image' => updateImage('products',$this->image,$this->product->image)
            ]);
        }



        Log::createLog(auth()->user()->id,'update','محصول '.$this->product->title. ' ویرایش شد ');

        $this->emit('toast','success','اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('admin.products.index');
    }


    public function render()
    {
        $this->authorize('manage_products',Product::class);
        $categories = Category::where('level',1)->get();
        $sub = Category::where('level',2)->get();
        $child = Category::where('level',3)->get();
        $brands = Brand::all();
        $warranties = Warranty::orderBy('id','Asc')->get();
        $tags = Tag::orderBy('id','Asc')->get();
        $colors = Color::all();
        $product = $this->product;

        return view('livewire.admin.products.edit',compact([
            'categories',
            'sub',
            'child',
            'brands',
            'warranties',
            'tags',
            'colors',
            'product'
        ]));
    }
}
