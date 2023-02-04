<?php

namespace App\Models\Admin\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warranty extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'warranties';
    protected $connection = 'mysql_products';
    protected $guarded = false;


}
