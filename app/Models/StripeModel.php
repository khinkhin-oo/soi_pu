<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StripeModel extends Model
{
    protected $table = 'stripe';

    protected $fillable = 
    [
        'stripe_status',
        'mode',
        'sandbox_secret_key',
        'sandbox_publishable_key',
        'live_secret_key',
        'live_publishable_key'
    ]; 
}

