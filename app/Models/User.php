<?php

namespace App\Models;

use App\Models\Admin\Log;
use App\Models\Admin\Permissions\Permission;
use App\Models\Admin\Permissions\Role;
use App\Models\Home\Token;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use SoapClient;

class User extends Authenticatable
{

    use HasFactory;
    use Notifiable;


    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $guarded = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //Logs
    public function logs()
    {
        return $this->belongsToMany(Log::class);

    }

    //Tokens for sms
    public function tokens()
    {
        return $this->hasMany(Token::class, 'id', 'user_id');

    }

    //Permissions
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);

    }

    //Roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);

    }

    //sendSms
    public static function sendSms($code, $mobile)
    {
        ini_set("soap.wsdl_cache_enabled", "0");
        $sms_client = new SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl', array('encoding'=>'UTF-8'));

        $parameters['username'] = "9398933139";
        $parameters['password'] = "PE@D6";
        $parameters['to'] = $mobile;
        $parameters['from'] = "50004001933139";
        $parameters['text'] ="کد تایید شما : ".$code;
        $parameters['isflash'] =false;

        return $sms_client->SendSimpleSMS2($parameters)->SendSimpleSMS2Result;
    }


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
}
