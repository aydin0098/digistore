<?php

namespace App\Models\Admin\Products;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    protected $table = 'products';
    protected $connection = 'mysql_products';
    protected $guarded = false;


    public function brands()
    {
        return $this->belongsTo(Brand::class);

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);

    }

    public function warranties()
    {
        return $this->belongsTo(Warranty::class,'warranty_id','id');

    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'ename'
            ]
        ];
    }
}
