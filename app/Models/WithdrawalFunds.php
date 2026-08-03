<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawalFunds extends Model
{
    protected $fillable = [
        'wallet_id',
        'user_id',
        'summary'
    ];
}
