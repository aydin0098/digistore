<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'categories';
    protected $connection = 'mysql_products';
    protected $guarded = false;

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id');

    }

}
