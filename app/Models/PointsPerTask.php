<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PointsPerTask extends Model
{
    protected $fillable = [
        'subject_id',
        'task_number',
        'max_points'
    ];
    public  function subject():BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
