<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class TransactionsModel extends Model implements AuthenticatableContract,
                                          AuthorizableContract,
                                          CanResetPasswordContract

{
    use Authenticatable, Authorizable, CanResetPassword;
    
     /**
    * @return mixed
    */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
    * @return array
    */
    public function getJWTCustomClaims()
    {
        return [];
     //return ['user' => ['id' => $this->id]];
    }

    protected $table = 'payments';

    protected $fillable = 
    [
    'user_id',
    'transaction_id',
    'package',
    'price',
    'status',
    'type',
    'slug',
    'order_id'
    ];

    public function get_user_details() 
    {
       return $this->hasOne('App\Models\UsersModel', 'id', 'user_id');
    }

    public function get_orer_details() 
    {
       return $this->hasOne('App\Models\OrderModel', 'id', 'order_id');
    }
}
