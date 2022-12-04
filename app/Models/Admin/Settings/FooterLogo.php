<?php

namespace App\Models\Admin\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FooterLogo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'footer_logos';
    protected $connection = 'mysql_settings';
    protected $guarded = false;
}
