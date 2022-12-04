<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Session;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Auth;
//use Session;

class WebAdmin extends Model implements Authenticatable, CanResetPasswordContract
{
    use AuthenticableTrait, CanResetPassword, Notifiable;
    // protected $connection = 'mongodb';
    protected $table = 'web_admin';

    protected $hidden = array('password', 'remember_token');

   // protected $table = 'web_admin';

    protected $fillable = ['user_name','company_name','email','password','contact','address','profile_image','role'];

    public function admin_role()
    {
        return $this->belongsTo('App\Models\UserHasRolesModel', 'id', 'web_admin_id');
    }
}