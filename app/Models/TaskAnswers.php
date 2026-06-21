<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskAnswers extends Model
{
    //
    protected $fillable = [
        'task',
        'right'
    ];
}
