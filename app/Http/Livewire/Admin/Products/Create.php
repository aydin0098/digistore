<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Admin\Log;
use App\Models\Admin\Products\Brand;
use App\Models\Admin\Products\Category;
use App\Models\Admin\Products\Color;
use App\Models\Admin\Products\Product;
use App\Models\Admin\Products\Tag;
use App\Models\Admin\Products\Warranty;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

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




    public Product $product;

    public function mount()
    {
        $this->product = new Product();

    }

    protected $rules = [
        'product.title' => 'required',
        'product.ename' => 'required',
        'level1_id' => 'required',
        'level2_id' => 'required',
        'level3_id' => 'required',
        'brand_id' => 'required',
        'product.description' => 'required',
        'product.body' => 'required',
        'product.price' => 'required',
        'product.discount_price' => 'nullable',
        'product.count' => 'nullable',
        'product.weight' => 'nullable',
        'product.orderMax' => 'nullable',
        'product.orderMin' => 'nullable',
        'product.isActive' => 'nullable',
        'product.special' => 'nullable',
        'tag_id' => 'nullable',
        'color_id' => 'required',
        'warranty_id' => 'required',
        'image' => 'required'
    ];

    public function store()
    {
        $this->validate();
        $product = Product::create([
            'title' => $this->product->title,
            'ename' => $this->product->ename,
            'image' => $this->image ? uploadImage('products',$this->image) : null,
            'level1_id' => $this->level1_id,
            'level2_id' => $this->level2_id,
            'level3_id' => $this->level3_id,
            'brand_id' => $this->brand_id,
            'warranty_id' => $this->warranty_id,
            'description' => $this->product->description,
            'body' => $this->product->body,
            'price' => $this->product->price,
            'discount_price' => $this->product->discount_price,
            'count' => $this->product->count,
            'weight' => $this->product->weight,
            'orderMax' => $this->product->orderMax,
            'orderMin' => $this->product->orderMin,
            'special' => $this->product->special ? 1 : 0,
            'isActive' => $this->product->isActive ? 1 : 0
        ]);

        $product->tags()->sync($this->tag_id);
        $product->colors()->sync($this->color_id);





        Log::createLog(auth()->user()->id,'insert','محصول جدیدی اضافه شد');
        $this->emit('toast', 'success', 'رکورد با موفقیت ثبت شد');
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
        return view('livewire.admin.products.create',compact([
            'categories',
            'sub',
            'child',
            'brands',
            'warranties',
            'tags',
            'colors'
        ]));
    }
}
