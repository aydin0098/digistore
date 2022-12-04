<?php

namespace App\Models\Home;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $guarded = false;

    public static function tokenUpdate($token,$userId,$code,$type,$mobile)
    {
        $token->update([
            'user_id' => $userId,
            'code' => $code,
            'type' => $type,
            'expired_at' => Carbon::now()->addMinutes(3)
        ]);
        //TODO Send SMS To Phone
//     User::sendSms($code, $mobile);

    }

    public static function tokenCreate($userId,$code,$type,$mobile)
    {
        Token::create([
            'user_id' => $userId,
            'code' => $code,
            'type' => $type,
            'expired_at' => Carbon::now()->addMinutes(3)
        ]);
        //TODO Send SMS To Phone
//        User::sendSms($code, $mobile);

    }

    public function users()
    {
        return $this->belongsTo(User::class);

    }


}
