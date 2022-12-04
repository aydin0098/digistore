<?php

namespace App\Models\Admin;

use App\Models\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'logs';
    protected $connection = 'mysql_settings';
    protected $guarded = false;


    public function getCreatedAtAttribute($created_at)
    {
        $createDate = new Verta($created_at);
        $createDate = $createDate->format('H:i:s - Y/m/d');
        return $createDate;
    }

    public static function createLog($user,$actionType,$description)
    {
        Log::create([
            'user_id' => $user,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'actionType' => $actionType,
            'description' => $description
        ]);
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');


    }
}
