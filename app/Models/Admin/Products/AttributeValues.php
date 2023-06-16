<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeValues extends Model
{
    use HasFactory;
    protected $table = 'attribute_values';
    protected $connection = 'mysql_products';
    protected $guarded = false;
    use SoftDeletes;

    public function attributes()
    {
        return $this->belongsTo(Attribute::class);

    }


}
