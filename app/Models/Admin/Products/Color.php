<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'colors';
    protected $connection = 'mysql_products';
    protected $guarded = false;


    public function products()
    {
        return $this->belongsToMany(Product::class);

    }
}
