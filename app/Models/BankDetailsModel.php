<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankDetailsModel extends Model
{
    
    protected $table  = "bank_account";

    protected $fillable = ['user_id',
                            'bank_name',
                            'account_holder_name',
                            'branch_name',
                            'sort_code',
                            'bic',
                            'account_number',
                            'bank_address',
                            'status'
                        ];

    public function user_details()
    {
        return $this->belongsTo('App\Models\UsersModel', 'user_id', 'id');
    }

    public function restaurant_details()
    {
        return $this->belongsTo('App\Models\UsersModel', 'restaurant_id', 'id');
    }

    public function address_details()
    {
        return $this->belongsTo('App\Models\AddressModel', 'address_id', 'id');
    }
}
