<?php

namespace App\Models\Admin\Products;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $connection = 'mysql_products';
    protected $guarded = false;

    public function products()
    {
        return $this->belongsToMany(Product::class);

    }
}
