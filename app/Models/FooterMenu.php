<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FooterMenu extends Model
{
    use HasFactory;
    protected $table = 'footer_menus';
    protected $connection = 'mysql_settings';
    protected $guarded = false;
}
