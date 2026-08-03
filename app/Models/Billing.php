<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = [
        'operation_type',
        'tutor_id',
        'summary',
        'solution_id',
        'wallet_id'
    ];
}
