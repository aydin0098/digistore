<?php

namespace App\Models\Admin\Permissions;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;

    public function users()
    {
        return $this->belongsToMany(User::class);

    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
