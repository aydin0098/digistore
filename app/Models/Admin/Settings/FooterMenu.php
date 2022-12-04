<?php

namespace App\Models\Admin\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterMenu extends Model
{
    use HasFactory;
    protected $table = 'footer_menus';
    protected $connection = 'mysql_settings';
    protected $guarded = false;
}
