<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionSolution extends Model
{
    protected $fillable = [
        'user_id',
        'is_solved',
        'option_id'
    ];

}
