<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSolution extends Model
{
    //
    protected $fillable = [
        'user_answer',
        'task_id',
        'user_id',
        'state'
    ];
    public function task():BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
    public function source():BelongsTo
    {
        return $this->belongsTo(TaskSource::class, 'id_task_source');
    }
}
