<?php

namespace App\Models\Admin\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $table = 'footers';
    protected $connection = 'mysql_settings';
    protected $guarded = false;
}
