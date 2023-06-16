<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory;
    protected $table = 'attributes';
    protected $connection = 'mysql_products';
    protected $guarded = false;
    use SoftDeletes;

    public function products()
    {
        return $this->belongsToMany(Product::class);

    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValues::class);

    }
}
