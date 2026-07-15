<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RightSolution extends Model
{
    protected $fillable = [
        'author_id',
        'task_id',
        'solution',
        'files_path'
    ];
}
